<script src="common-js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    let isCursorOut = false;

    $(document).mouseleave(function () {
        isCursorOut = true;
    });

    $(document).mouseenter(function () {
        isCursorOut = false;
    });

    window.onbeforeunload = function () {
        if (isCursorOut) {
            return "Are you sure you want to leave?";
        }
    }
</script>
