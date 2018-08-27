<div class="content mt-3">

<div class="notes-1">
  <div class="notes-item">
    <div class="item-content">
      <div class="notes-content" style="width: 200px; height: 300px; background-color: #ff0;">
        <h1>300X300</h1>
      </div>
    </div>
  </div>


  <div class="notes-item">
    <div class="item-content">
      <div class="notes-content" style="width: 200px; height: 300px; background-color: #ff0;">
        <h1>300X300</h1>
      </div>
    </div>
  </div>

  <div class="notes-item">
    <div class="item-content">
      <div class="notes-content" style="width: 200px; height: 300px; background-color: #ff0;">
        <h1>300X300</h1>
      </div>
    </div>
  </div>
  
  
</div>
<script type="text/javascript">


  var grid1 = new Muuri('.notes-1', {
    dragEnabled: true,
    dragContainer: document.body,
    dragSort: function () {
      return [grid1]
    }
  });

  // Prevent native image drag for images inside items.
  var images = document.querySelectorAll('.notes-item .notes-content');
  for (var i = 0; i < images.length; i++) {
    images[i].addEventListener('dragstart', function (e) {
      e.preventDefault();
    }, false);
  }

  // Refresh item dimensions and do layout after all images have loaded.
  window.addEventListener('load', function () {

    grid1.refreshSortData();
    grid1.layout();
  });

</script>

</div> <!-- .content -->
