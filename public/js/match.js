$(function() {
    get_match();
});

function get_match() {
    $.ajax({
        url: "result/ajax/",
        dataType: "json",
        success: data => {
            var haha = '<div>${data.wtpeoples[0].status}</div>';
            console.log(data);
        },
        error: () => {
            alert("ajax Error");
        }
    });
    setTimeout("get_match()", 5000);
}