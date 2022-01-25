var $ = mdui.$;
var inst = new mdui.Drawer('#drawer',swipe=true);

// method
$('#toggle').on('click', function () {
    inst.toggle();
  });

// event
$('#drawer').on('open.mdui.drawer', function () {
  console.log('open');
});

$('#drawer').on('opened.mdui.drawer', function () {
  console.log('opened');
});

$('#drawer').on('close.mdui.drawer', function () {
  console.log('close');
});

$('#drawer').on('closed.mdui.drawer', function () {
  console.log('closed');
});