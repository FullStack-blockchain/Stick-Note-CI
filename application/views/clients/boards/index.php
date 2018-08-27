<div class="content mt-3">

<div class="notes-1">
  
  <?php
    foreach ($results as $res) {
  ?>
      <div class="notes-item">
        <div class="item-content">
          <div class="notes-content">
              <div class="card border border-primary" style="width: 300px; <?php echo ($res['color_id'] != '') ? 'background-color: '.$res['color_id'] : ''; ?> ">
                  <div class="card-header">
                      <strong id="<?php echo $res['id']; ?>" name="<?php echo $res['position']; ?>" class="card-title"><?php echo nl2br($res['title']); ?></strong>
                  </div>
                  <div class="card-body">
                      <p class="card-text"><?php echo nl2br($res['description']); ?></p>
                  </div>
              </div>
          </div>
        </div>
      </div>
  <?php
    }
  ?>
</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <?php echo form_open(site_url('clients/boards/notes'), 'class="" id="notes_form"'); ?>

        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" name="board_id" id="board_id" value="<?php echo $menuitem['id']; ?>" />
                <input type="hidden" name="notes_id" id="notes_id" value="" />
                <input type="hidden" name="notes_color" id="notes_color" value="#fafafa" />
                <textarea <?php echo ($menuitem['id'] == TRASH_BOARD_ID) ? 'readonly' : ''; ?> name="notes_title" id="notes_title" tabindex="1" rows='1' class="note-textarea-title" placeholder="Title" maxlength="512"></textarea>
            </div>
            <div class="modal-body">
                <textarea <?php echo ($menuitem['id'] == TRASH_BOARD_ID) ? 'readonly' : ''; ?> name="notes_contents" id="notes_contents" tabindex="2" rows='1' class="note-textarea-content" placeholder="Take a note ..."></textarea>
            </div>
            <div class="modal-footer">
              <div class="content">
                <div class="row">
                  <div class="col">
                    <div class="content" id="add_attach_file_list" style="margin-bottom: 10px;">
                    </div>
                    <div class="content">
                      <div class="row">
                        <div class="col">
                          <div class="progress mb-2" style="display: none;">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <?php if($menuitem['id'] != TRASH_BOARD_ID) { ?>
                      <div class="note-toolbar">
                        <div class="row" >
                          <div class="col-sm-1">
                            <div class="for-color">
                              <div class="dropdown">
                                <button type="button" class="toolbar-btn"  data-toggle="dropdown" aria-label="Color">
                                    <span class="ti-palette"></span>
                                </button>
                                <div class="dropdown-menu" style="min-width: 140px;">
                                  <div class="funkyradio">
                                      <div class="funkyradio-white">
                                          <input type="radio" name="colorradio" id="rd_color_fafafa" value="#fafafa"  />
                                          <label for="rd_color_fafafa">White</label>
                                      </div>
                                      <div class="funkyradio-red">
                                          <input type="radio" name="colorradio" id="rd_color_ff8a80" value="#ff8a80" checked/>
                                          <label for="rd_color_ff8a80">Red</label>
                                      </div>
                                      <div class="funkyradio-orange">
                                          <input type="radio" name="colorradio" id="rd_color_ffd180"value="#ffd180"  />
                                          <label for="rd_color_ffd180">Orange</label>
                                      </div>
                                      <div class="funkyradio-yellow">
                                          <input type="radio" name="colorradio" id="rd_color_ffff8d"value="#ffff8d"  />
                                          <label for="rd_color_ffff8d">Yellow</label>
                                      </div>
                                      <div class="funkyradio-green">
                                          <input type="radio" name="colorradio" id="rd_color_ccff90"value="#ccff90"  />
                                          <label for="rd_color_ccff90">Green</label>
                                      </div>
                                      <div class="funkyradio-teal">
                                          <input type="radio" name="colorradio" id="rd_color_a7ffeb"value="#a7ffeb"  />
                                          <label for="rd_color_a7ffeb">Teal</label>
                                      </div>
                                      <div class="funkyradio-blue">
                                          <input type="radio" name="colorradio" id="rd_color_80d8ff"value="#80d8ff"  />
                                          <label for="rd_color_80d8ff">Blue</label>
                                      </div>
                                      <div class="funkyradio-darkblue">
                                          <input type="radio" name="colorradio" id="rd_color_82b1ff"value="#82b1ff"  />
                                          <label for="rd_color_82b1ff">Darkblue</label>
                                      </div>
                                      <div class="funkyradio-purple">
                                          <input type="radio" name="colorradio" id="rd_color_b388ff"value="#b388ff"  />
                                          <label for="rd_color_b388ff">Purple</label>
                                      </div>
                                      <div class="funkyradio-pink">
                                          <input type="radio" name="colorradio" id="rd_color_f8bbd0"value="#f8bbd0"  />
                                          <label for="rd_color_f8bbd0">Pink</label>
                                      </div>
                                      <div class="funkyradio-brown">
                                          <input type="radio" name="colorradio" id="rd_color_d7ccc8"value="#d7ccc8"  />
                                          <label for="rd_color_d7ccc8">Brown</label>
                                      </div>
                                      <div class="funkyradio-gray">
                                          <input type="radio" name="colorradio" id="rd_color_cfd8dc"value="#cfd8dc"  />
                                          <label for="rd_color_cfd8dc">Gray</label>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-1">
                            <div class="for-board">
                              <div class="dropdown">
                                <button type="button" class="toolbar-btn"  data-toggle="dropdown" aria-label="Color">
                                    <i class="fa fa-dashboard"></i>
                                </button>
                                <div class="dropdown-menu" style="min-width: 180px;">
                                  <div class="funkyradio">
                                    <?php
                                      foreach ($lstmenus as $menu) {
                                        $cur_menu = ($menu['id'] === $menuitem['id']) ? 'checked' : '';
                                    ?>
                                        <div class="funkyradio-red">
                                            <input type="radio" name="boardradio" id="<?php echo 'rd_board_'.$menu['id']; ?>" value="<?php echo $menu['id']; ?>" <?php echo $cur_menu; ?> />
                                            <label for="<?php echo 'rd_board_'.$menu['id']; ?>"><?php echo $menu['title']; ?></label>
                                        </div>
                                    <?php
                                      }
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-1">
                            <button type="button" class="toolbar-btn" data-toggle="modal" data-target="#friendModal">
                                <span class="ti-user"></span>
                            </button>
                          </div>
                          <div class="col-sm-1">
                            <div class="file-upload-icon">
                              <i id="i_txt_file_attach_upload" class="fa fa-cloud-upload"></i>
                              <input type="file" name="txt_file_attach_upload" id="txt_file_attach_upload">
                            </div>
                          </div>
                        </div>                        
                      </div>
                    <?php } ?>
                  </div>
                  <div class="col-sm-6">
                    <?php if($menuitem['id'] != TRASH_BOARD_ID) { ?>
                      <button type="submit" id="notes_submit" class="btn btn-primary" tabindex="3" onclick="" style="float: right;">Apply</button>
                    <?php } ?>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right;">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
      <?php echo form_close(); ?>
    </div>
</div>

<div class="modal fade" id="friendModal" tabindex="-1" role="dialog" aria-labelledby="friendModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="friendModalLabel">Collaborators</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="content">
                  <div class="row">
                    <div class="col">
                      <div class="card collaborators-card">
                            <div class="card-body collaborators-card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                                    <div class="stat-content dib">
                                        <div id="coll_owner_name" class="stat-digit">name</div>
                                        <div id="coll_owner_email" class="stat-text">owner@ex.com</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div id="add_collaborators" class="content">
                </div>
                <div class="content">
                  <div class="row">
                    <div class="col">
                      <div class="card collaborators-card">
                            <div class="card-body collaborators-card-body">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                                    <div class="stat-content dib collaborators-email">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="txt_coll_email"" placeholder="Person or email to share with" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var $ = jQuery;

  var jquery_update_coll_list_func = null;

  jQuery(function($) {
    $("#i_txt_file_attach_upload").click(function () {
      $("#txt_file_attach_upload").click();
    });

    $('#txt_file_attach_upload').on('change', function() {
        var url = "<?php echo site_url('clients/boards/attach_file_upload'); ?>";

        var inputFile=$('#txt_file_attach_upload');
        var fileToUpload=inputFile[0].files[0];
        var formdata = new FormData();
        formdata.append( 'txt_file_attach_upload', fileToUpload );
        formdata.append('notes_id', $('#notes_id').val());

        var data = formdata;
        $.ajax({
            type: "POST",
            url: url, 
            data: data,
            processData: false,
            contentType: false,
            beforeSend: function(xhr){
              $(".progress-bar").html("0%");
              $(".progress-bar").css('width', '0%');
              $(".progress").css("display", "block");
            },
            // this part is progress bar
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);
                        $(".progress-bar").html(percentComplete + "%");
                        $(".progress-bar").css('width', percentComplete +'%');
                    }
                }, false);
                return xhr;
            },
            success : 
                function(msg) {
                    msg = JSON.parse(msg);
                    setTimeout(function() {
                        $(".progress").css("display", "none");
                        $(".progress-bar").html("0%");
                        $(".progress-bar").css('width', '0%');
                        show_attached_file_list(msg);
                    }, 1000);
                      
                }            
        });
    })

    $('input[name="colorradio"]').change(function(){ 
      var backcolor = $('input[name="colorradio"]:checked').val();
      set_notesdlg_backcolor(backcolor);
      $("#notes_color").val(backcolor);
    });

    $('input[name="boardradio"]').change(function(){ 
      var board_id = $('input[name="boardradio"]:checked').val();
      $("#board_id").val(board_id);
    });
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
    $('#friendModal').on('show.bs.modal', function (event) {
      update_coll_list();
    });

    function update_coll_list(delete_id = "")
    {
      board_id = $("#board_id").val();
      notes_id = $("#notes_id").val();
      new_email = $("#txt_coll_email").val()
      var url = "<?php echo site_url('clients/boards/get_collaborators'); ?>";
      $.ajax({
          type: "POST",
          url: url, 
          data: {board_id: board_id, notes_id: notes_id, new_email: new_email, delete_id: delete_id},
          ContentType: 'application/json',
          success : 
              function(msg) {
                  results = JSON.parse(msg);
                  res = results.lst_colla;
                  is_added = results.is_added;
                  var i = 0; var newHtml = '';
                  var has_data = false;
                  for (i = 0; i < res.length; i++) {
                    if(res[i].role == 'owner')
                    {
                      $("#coll_owner_email").html(res[i].email);
                      $("#coll_owner_name").html(res[i].username + '<span style="font-size: 16px;">(Owner)</span>');
                      $("#notes_id").val(res[i].task_id);
                    }
                    else
                    {
                      newHtml += 
                        '<div class="row" id="item_collaborators_' + res[i].id + '" >' + 
                          '<div class="col">' +
                            '<div class="card collaborators-card">' + 
                                  '<div class="card-body collaborators-card-body">' + 
                                      '<div class="stat-widget-one">' +
                                          '<div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>' +
                                          '<div class="stat-content dib">' +
                                              '<div class="stat-digit">' + res[i].username + '</div>' +
                                              '<div class="stat-text">' + res[i].email + '</div>' + 
                                          '</div>' +
                                          '<button onclick="btn_remove_colla(' + res[i].id + ')" type="button" class="close" style="margin-top: 20px;">' +
                                              '<span aria-hidden="true">&times;</span>' +
                                          '</button>' +
                                      '</div>' +
                                  '</div>' +
                              '</div>' +
                            '</div>' +
                        '</div>';
                      $("#add_collaborators").html(newHtml);
                      has_data = true;
                    }
                  }
                  if(!has_data) $("#add_collaborators").html("");
              }
      });
    }
    jquery_update_coll_list_func = update_coll_list;

    $( "#txt_coll_email" ).keypress(function() {
      if (event.keyCode == 13) {
        update_coll_list();
        $( "#txt_coll_email" ).val("");
      }
    });


    /**
     * search form
     */
    $( "#txt_search" ).keypress(function() {
      if (event.keyCode == 13) {
        $("#search_form").submit();
      }
    });
    $("#btn_search_txt").click(function () {
        setTimeout(function(){
          var originalValue = $( "#txt_search" ).val();
          $( "#txt_search" ).val('');
          $( "#txt_search" ).blur().focus().val(originalValue);
        },100);
    });
    /* search form end */
    
    
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

        el.style.height = 'auto';
        el.style.padding = '0px';
        if(el.scrollHeight < fix_hei)
          el.style.height = el.scrollHeight + 'px';
        else
          el.style.height = fix_hei + 'px';
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
          //notes dialog open - modify
          notes_id = item.getElement().getElementsByClassName('card-title')[0].getAttribute("id");

          var url = "<?php echo site_url('clients/boards/getnotesbyid'); ?>";
          $.ajax({
              type: "POST",
              url: url, 
              data: {notes_id: notes_id},
              ContentType: 'application/json',
              success : 
                  function(msg) {
                      msg = JSON.parse(msg);
                      $('#largeModal').modal('show');
                      //$("#btn_notes").click();
                      open_notes_dialog(msg);
                  }
          });
        }
      });
      
    });
  });

  function btn_remove_colla(id)
  {
    jquery_update_coll_list_func(id);
  }

  function open_notes_dialog(msg = null)
  {
    $ = jQuery;
    notes_id = (msg == null) ? "" : msg.id;
    document.getElementById("notes_id").value = notes_id;
    document.getElementById("notes_title").value = (msg == null) ? "" : msg.title;
    document.getElementById("notes_contents").value = (msg == null) ? "" : msg.description;
    backcolor = (msg == null) ? "#fafafa" : msg.color_id;
    document.getElementById("notes_color").value = backcolor;
    document.getElementById("rd_color_" + backcolor.substring(1)).checked = true;

    board_id = (msg == null) ? "<?php echo $menuitem['id']; ?>" : msg.column_id;
    document.getElementById("board_id").value = board_id;
    document.getElementById("rd_board_" + board_id).checked = true;
    set_notesdlg_backcolor(backcolor);

    show_attached_file_list(notes_id);
  }

  function btn_remove_attached_file(notes_id, delete_id = "")
  {
    show_attached_file_list(notes_id, delete_id)
  }
  function show_attached_file_list(notes_id, delete_id = "")
  {
      $ = jQuery;
      var url = "<?php echo site_url('clients/boards/show_attached_file_list'); ?>";
      $.ajax({
          type: "POST",
          url: url, 
          data: {notes_id: notes_id, delete_id: delete_id},
          ContentType: 'application/json',
          success : 
              function(msg) {
                  res = JSON.parse(msg);
                  var has_data = false;
                  var newHtml = "";
                  for (i = 0; i < res.length; i++) {
                      newHtml += 
                        '<div class="row" id="item_attached_file_' + res[i].id + '" >' + 
                          '<div class="col">' +
                            '<div class="card attached-file-card">' + 
                                  '<div class="card-body collaborators-card-body">' + 
                                      '<div class="stat-widget-one">' +
                                          '<div class="stat-content dib" style="margin:0px !important;">' +
                                              '<div class="stat-digit"><a target="_blank" href="' + 
                                              '<?php echo site_url(ATTACH_FILE_UPLOAD_PATH); ?>' + "/" + res[i].path +
                                              '">' + res[i].name + '</a></div>' + 
                                          '</div>' +
                                          '<button onclick="btn_remove_attached_file(' + notes_id + ',' + 
                                          res[i].id + ')" type="button" class="close" style="margin-top: 12px;">' +
                                              '<span aria-hidden="true">&times;</span>' +
                                          '</button>' +
                                      '</div>' +
                                  '</div>' +
                              '</div>' +
                            '</div>' +
                        '</div>';
                      $("#add_attach_file_list").html(newHtml);
                      has_data = true;
                  }
                  if(!has_data) $("#add_attach_file_list").html("");
              }
      });
  }
  function set_notesdlg_backcolor(backcolor)
  {
    $ = jQuery;
    $("#largeModal #notes_contents").css('background-color', backcolor);
    $("#largeModal #notes_title").css('background-color', backcolor);
    $("#largeModal .modal-content").css('background-color', backcolor);
    $("#largeModal .modal-header").css('border-bottom', '1px solid ' + backcolor);
    $("#largeModal .modal-footer").css('border-top', '1px solid ' + backcolor);
  }
  
</script>

</div> <!-- .content -->
