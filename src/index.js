const { render, useState } = wp.element;

const AppHeader = () => {

  return (

    <header>
      <img src="https://picsum.photos/50" />
    </header>

  );

}

const AppFooter = () => {

  return (

    <footer>
      <img src="https://picsum.photos/50" />
    </footer>

  );

}

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

render(<AppHeader />, document.getElementById('app-header'));
render(<CloseEditForm />, document.getElementById('edit-form-close-icon'));

render(<AppFooter />, document.getElementById('app-footer'));
