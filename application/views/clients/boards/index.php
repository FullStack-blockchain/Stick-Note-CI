<div class="content mt-3">
<button type="button" id="btn_notes" class="btn btn-secondary mb-1" onclick="open_notes_dialog()" data-toggle="modal" data-target="#largeModal"><?php echo 'New '.$menuitem['name']; ?></button>

<div class="notes-1">
  
  <?php
    foreach ($results as $res) {
  ?>
      <div class="notes-item">
        <div class="item-content">
          <div class="notes-content" style="background-color: #ff0;">
              <div class="card border border-primary" style="width: 300px;">
                  <div class="card-header">
                      <strong id="<?php echo $res['id']; ?>" name="<?php echo $res['position']; ?>" class="card-title"><?php echo $res['title']; ?></strong>
                  </div>
                  <div class="card-body">
                      <p class="card-text"><?php echo $res['description']; ?></p>
                  </div>
              </div>
          </div>
        </div>
      </div>
  <?php
    }
  ?>
      
</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <?php echo form_open(site_url('clients/boards/notes'), 'class="" id="notes_form"'); ?>

        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" name="board_id" id="board_id" value="<?php echo $menuitem['id']; ?>" />
                <input type="hidden" name="notes_id" id="notes_id" value="" />
                <textarea name="notes_title" id="notes_title" tabindex="1" rows='1' class="note-textarea-title" placeholder="Title" maxlength="512"></textarea>

                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <textarea name="notes_contents" id="notes_contents" tabindex="2" rows='1' class="note-textarea-content" placeholder="Take a note ..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="notes_submit" class="btn btn-primary" tabindex="3" onclick="">Confirm</button>
            </div>
        </div>
      <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
  var $ = jQuery;
  function open_notes_dialog(notes_id = "", notes_title = "", notes_contents = "")
  {
    document.getElementById("notes_id").value = notes_id;
    document.getElementById("notes_title").value = notes_title;
    document.getElementById("notes_contents").value = notes_contents;
  }
  jQuery(function($) {
    /**
     * Display long text to short
     */
    $(".card-title").each(function () {
        text = $(this).text();
        if (text.length > 80) {
            $(this).html(text.substr(0, 77) + '...');
        }
    });

    $(".card-text").each(function () {
        text = $(this).text();
        if (text.length > 700) {
            $(this).html(text.substr(0, 697) + '...');
        }
    });

    /**
     * notes dialog open
     */
    $('#largeModal').on('show.bs.modal', function (event) {
      setTimeout(function() {
          $("#notes_contents").focus();
          $("#notes_contents").trigger( "keydown" );
          $("#notes_title").focus();
          $("#notes_title").trigger( "keydown" );
      }, 1000);
    });
    
    /**
     * notes textarea
     */
    $(".note-textarea-title" ).keydown(function() {
      customTextAreaHeight(this, 200);
    });
    $( ".note-textarea-content" ).keydown(function() {
      customTextAreaHeight(this, 400);
    });

    function customTextAreaHeight(element, fix_hei)
    {
      var el = element;
      setTimeout(function(){
        el.style.cssText = 'height:auto; padding:0';
        if(el.scrollHeight < fix_hei)
          el.style.cssText = 'height:' + el.scrollHeight + 'px';
        else
          el.style.cssText = 'height:' + fix_hei + 'px';
      },0);
    }

    /**
     * drag and drop
     */
    var activeItem, isMoved = false;

    var grid1 = new Muuri('.notes-1', {
      dragEnabled: true,
      dragContainer: document.body,
      dragSort: function () {
        return [grid1]
      },
      dragStartPredicate: function (item, event) {
        if (item === activeItem) {
          return Muuri.ItemDrag.defaultStartPredicate(item, event);
        } else {
          return false;
        }
      }
    });

    var gridItemArr;

    grid1.on('dragEnd', function () {
      
      var allItems = grid1.getItems();
      var index = 0;
      for (index = 0; index < allItems.length; index++) { 
        var item = allItems[index];
        oid = item.getElement().getElementsByClassName('card-title')[0].getAttribute("id");
        opos = item.getElement().getElementsByClassName('card-title')[0].getAttribute("name");

        if(gridItemArr[index].id != oid)
        {
          gridItemArr[index].id = oid;
        }
      }
      var url = "<?php echo site_url('clients/boards/changenotespos'); ?>";
      data = JSON.stringify(gridItemArr);
      $.ajax({
          type: "POST",
          url: url, 
          data: {'data': data},
          ContentType: 'application/json',
          success : 
              function(msg) {
                  res = JSON.parse(msg);
                  var i = 0;
                  for (i = 0; i < res.length; i++) {          
                    var noteitems = document.getElementsByClassName('notes-item')[(res.length - 1 + i) % res.length];
                    opos = noteitems.getElementsByClassName('card-title')[0].setAttribute("name", res[i].position);
                  }
              }
      });


      activeItem = null;
    });

    grid1.on('dragStart', function () {
      
      var allItems = grid1.getItems();
      var index = 0;

      gridItemArr = [];
      for (index = 0; index < allItems.length; index++) { 
        var item = allItems[index];
        sid = item.getElement().getElementsByClassName('card-title')[0].getAttribute("id");
        spos = item.getElement().getElementsByClassName('card-title')[0].getAttribute("name");

        gridItemArr.push({
            id: sid, 
            position: spos
        });
      }
    });

    grid1.getItems().forEach(function (item) {
      item.getElement().addEventListener('mousedown', function () {
        activeItem = item;
      });
      item.getElement().addEventListener('mousemove', function () {
        isMoved = (activeItem == item) ? true : false;
      });
      item.getElement().addEventListener('mouseup', function () {
        activeItem = null;
        if(isMoved)
        {
          isMoved = false;
        }
        else
        {
          //notes dialog open
          notes_id = item.getElement().getElementsByClassName('card-title')[0].getAttribute("id");

          var url = "<?php echo site_url('clients/boards/getnotesbyid'); ?>";
          $.ajax({
              type: "POST",
              url: url, 
              data: {notes_id: notes_id},
              success : 
                  function(msg) {
                      msg = JSON.parse(msg);
                      $("#btn_notes").click();

                      open_notes_dialog(msg.id, msg.title, msg.description);
                  }
          });

        }
      });
      
    });
  });
</script>

</div> <!-- .content -->
