 $(function zoeken() {
        $("#zoeker").change(function () {
            var tekst = $(this).val();
            $(".item").hide();
            $(".item h3:contains('" + tekst + "')").parent().show();
            $('#masonry').masonry({
            columWidth: 'div.item',
            itemSelector: 'div.item'
            })
        })
 });
 
$.getScript( "../js/masonry.js", function(zoeken) {
            $('#masonry').masonry({
            columWidth: 'div.item',
            itemSelector: 'div.item'
        })
    })