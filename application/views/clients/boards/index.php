<div class="content mt-3">
<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#largeModal">New Notes</button>

<div class="notes-1">
  <div class="notes-item">
    <div class="item-content">
      <div class="notes-content" style="background-color: #ff0;">
          <div class="card border border-primary" style="width: 300px;">
              <div class="card-header">
                  <strong class="card-title">Card OutlineSome quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.</strong>
              </div>
              <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's content</p>
              </div>
          </div>
      </div>
    </div>
  </div>

  <div class="notes-item">
    <div class="item-content">
      <div class="notes-content" style="background-color: #ff0;">
          <div class="card border border-primary" style="width: 300px;">
              <div class="card-header">
                  <strong class="card-title">Card OutlineSome quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.</strong>
              </div>
              <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.ome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's contentome quick example text to build on the card title and make up the bulk of the card's content</p>
              </div>
          </div>
      </div>
    </div>
  </div>

  <div class="notes-item">
    <div class="item-content">
      <div class="notes-content" style="background-color: #ff0;">
          <div class="card border border-primary" style="width: 300px;">
              <div class="card-header">
                  <strong class="card-title">Card OutlineSome quick example text to build on the card title and make up the bulk of th.</strong>
              </div>
              <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the caick example text to build on the card title and make up the bulk of the card's content</p>
              </div>
          </div>
      </div>
    </div>
  </div>

  <div class="notes-item">
    <div class="item-content">
      <div class="notes-content" style="background-color: #ff0;">
          <div class="card border border-primary" style="width: 300px;">
              <div class="card-header">
                  <strong class="card-title">Card's content.</strong>
              </div>
              <div class="card-body">
                  <p class="card-text">Some quick exampl</p>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <textarea rows='1' class="note-textarea-title" placeholder="Title" maxlength="512" autofocus></textarea>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea rows='1' class="note-textarea-content" placeholder="Take a note ..." autofocus></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
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
    alert('a');
  })

  /**
   * notes textarea
   */
  $(".note-textarea-title" ).keydown(function() {
    var el = this;
    setTimeout(function(){
      el.style.cssText = 'height:auto; padding:0';
      if(el.scrollHeight < 200)
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
      else
        el.style.cssText = 'height:200px';
    },0);
  });
  $( ".note-textarea-content" ).keydown(function() {
    var el = this;
    setTimeout(function(){
      el.style.cssText = 'height:auto; padding:0';
      if(el.scrollHeight < 400)
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
      else
        el.style.cssText = 'height:400px';
    },0);
  });

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

  grid1.on('dragEnd', function () {
    activeItem = null;
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
        alert("open");
      }
    });
    
  });

  // // Prevent native image drag for images inside items.
  // var images = document.querySelectorAll('.notes-item .notes-content');
  // for (var i = 0; i < images.length; i++) {
  //   images[i].addEventListener('dragstart', function (e) {
  //     e.preventDefault();
  //   }, false);
  // }

  // // Refresh item dimensions and do layout after all images have loaded.
  // window.addEventListener('load', function () {
  //   grid1.refreshSortData();
  //   grid1.layout();
  // });

  // grid1.getItems().forEach(function (item) {
  //   item.getElement().addEventListener('click', function () {
  //     alert("bbbb");
  //   });
  // });

</script>

</div> <!-- .content -->
