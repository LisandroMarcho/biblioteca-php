window.addEventListener('load', marginContainer());
document.addEventListener('resize', marginContainer());

function marginContainer(){
    var pageWidth =  window.innerWidth;
    var sidebarWidth = pageWidth * .15 ;
    var container = document.getElementById('container');
    var sidebar = document.getElementById('sidebar');

    sidebar.style.width = sidebarWidth + 'px';
    container.style.marginLeft = sidebarWidth + 'px';
    console.log({
        pageWidth,
        sidebarWidth
    })
}