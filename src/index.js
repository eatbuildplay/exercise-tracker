const { render, useState } = wp.element;

const CloseEditForm = () => {

  function doClose(e) {
    e.preventDefault();
    console.log('close what bitch?');
  }

  return (
    <div>
      <button onClick={doClose}>CLOSEX</button>
    </div>
  );

};

const parent = document.getElementById('edit-form-close-icon');
render(<CloseEditForm />, parent);
