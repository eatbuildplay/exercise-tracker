jQuery(document).ready(function( $ ) {

function addButtonClick() {


  let button = document.getElementById('add-log-entry-button');
  button.onclick = function(e) {

    let formParent = $('#add-log-entry');
    let form = $('#add-exercise-log-form');
    const formClone = form.clone(1, 1);

    formParent.html( formClone )
    formClone.show();

  }

}

function editButtonClick() {

  $( document ).on('click', '.edit-button', function() {

    console.log(24)

    let itemId = $(this).data('id');
    let item = window.objects[itemId];

    var formParent = $('#add-log-entry');

    console.log( formParent )

    var form = $('#edit-exercise-log-form');

    console.log( form )

    const formClone = form.clone(1, 1);
    formParent.html( formClone );
    formClone.find('form').attr('data-id', itemId);
    formClone.find('#field-timestamp').val( item.date );
    formClone.find('#field-exercise').val( item.exercise.id );
    formClone.find('#field-quantity').val( item.quantity );
    formClone.find('#field-unit').val( item.unit );
    formClone.show();

  });

}

function deleteButtonClick() {

  $( document ).on('click', '.delete-button', function() {

    let postId = $(this).data('id');

    var data = {
      id: postId
    };
    wp.ajax.post('exercise_log_delete', data).done( function( response ) {

      $('tr.item-id-' + response.item).remove();

    });

  });


}




  /* Prevent any forms from submitting */
  function formSubmitPrevent() {
    $('form').on('submit', function(e) {
      console.log('form submit...')
      e.preventDefault();
    });
  }

  function load() {

    const data = {}
    wp.ajax.post('exercise_log_load', data)
      .done( function( response ) {

        let table = $('#exercise-log-table');

        // stash objects in variable
        // @TODO reindex by id first before stashing


        var objectReference = {};

        response.objects.forEach( function( item, index ) {

          objectReference[item.id] = item;

          var row = makeTableRow( item );
          table.prepend( row );

        });

        window.objects = objectReference;

      }
    );

  }

  function makeTableRow( item ) {
    var row = '<tr class="item-id-' + item.id + '">';
    row += '<td>';
    row += item.date;
    row += '</td>';
    row += '<td>';
    row += item.exercise.title;
    row += '</td>';
    row += '<td>';
    row += item.quantity;
    row += '</td>';
    row += '<td>';
    row += item.unit;
    row += '</td>';
    row += '<td class="item-controls">';
    row += '<button class="edit-button btn btn-info" data-id="' + item.id + '">Edit</button>';
    row += '<button class="delete-button btn btn-dark" data-id="' + item.id + '">Delete</button>';
    row += '</td>';
    row += '</tr>';
    return row;
  }

  function addFormProcess() {
    $('form#add-form').on('submit', function(e) {

      let date = $('#field-timestamp').val();
      let exercise = $('#field-exercise').val();
      let quantity = $('#field-quantity').val();
      let unit = $('#field-unit').val();

      const data = {
        date: date,
        exercise: exercise,
        quantity: quantity,
        unit: unit
      }
      wp.ajax.post('exercise_log_create', data)
        .done( function( response ) {

          let table = $('#exercise-log-table');

          var row = makeTableRow( response.item );
          table.prepend( row );

        }
      );

    });
  }

  function editFormProcess() {
    $('form#edit-form').on('submit', function(e) {

      let postId = $(this).data('id');
      let date = $('#field-timestamp').val();
      let exercise = $('#field-exercise').val();
      let quantity = $('#field-quantity').val();
      let unit = $('#field-unit').val();

      const data = {
        postId: postId,
        date: date,
        exercise: exercise,
        quantity: quantity,
        unit: unit
      }
      wp.ajax.post('exercise_log_update', data)
        .done( function( response ) {

          var row = makeTableRow( response.item );
          let currentRow = $('tr.item-id-' + response.item.id );

          console.log( response.item.id )
          console.log( currentRow )

          currentRow.replaceWith( row );

        }
      );

    });
  }

  function init() {

    load();

    addButtonClick();
    editButtonClick();
    deleteButtonClick();

    formSubmitPrevent();
    addFormProcess();
    editFormProcess();

  }

  // init app
  init();

});
