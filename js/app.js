function renderTable( exerciseLogJson ) {

  var exerciseLogTable = document.getElementById('exercise-log-table');

  exerciseLogJson.forEach( function( value, index ) {

    console.log( index );
    console.log( value );

    let row = document.createElement('tr');

    var td = document.createElement('td');
    var tdValue = document.createTextNode( value.date );
    td.appendChild(tdValue);
    row.appendChild(td);

    td = document.createElement('td');
    tdValue = document.createTextNode( value.exercise );
    td.appendChild(tdValue);
    row.appendChild(td);

    // controls column
    td = document.createElement('td');
    var editButton = document.createElement('button');
    editButton.className = 'edit-button';
    tdValue = document.createTextNode("EDIT");
    editButton.appendChild(tdValue);
    td.appendChild(editButton);

    var deleteButton = document.createElement('button');
    deleteButton.className = 'delete-button';
    tdValue = document.createTextNode("DELETE");
    deleteButton.appendChild(tdValue);
    td.appendChild(deleteButton);
    row.appendChild(td);

    exerciseLogTable.appendChild(row);

  });

}

function addButtonClick() {


  let button = document.getElementById('add-log-entry-button');
  button.onclick = function(e) {
    console.log('add button click...')


    let formParent = document.getElementById('add-log-entry');
    let form = document.getElementById('add-exercise-log-form');

    const formClone = form.cloneNode(1);

    console.log( formClone )

    formParent.appendChild( formClone )
    formClone.style.display = 'block';

  }

}

function editButtonClick() {


  let buttons = document.getElementsByClassName('edit-button');

  Array.from( buttons ).forEach(function(element) {
    element.addEventListener('click', function() {
      console.log('edit button click...')


      let formParent = document.getElementById('add-log-entry');
      let form = document.getElementById('edit-exercise-log-form');

      const formClone = form.cloneNode(1);

      console.log( formClone )

      formParent.appendChild( formClone )
      formClone.style.display = 'block';
    });
  });


}

function deleteButtonClick() {


  let buttons = document.getElementsByClassName('delete-button');

  Array.from( buttons ).forEach(function(element) {
    element.addEventListener('click', function() {

      console.log('delete button click...')

      

    });
  });


}

renderTable( exerciseLogJson );
addButtonClick();
editButtonClick();
deleteButtonClick();
