$(function () {
    console.log("ready !");

    setSubClasses();

    $('#dnd_class').change(function() {
        setSubClasses();
      });

});

function changeSelectOption(yourSelectList, new_options) {
    /* Remove all options from the select list */
    $(yourSelectList).empty();

    /* Insert the new ones from the array above */
    new_options.forEach(option => {
        $(yourSelectList).append('<option value="'+option.id+'">'+option.name+'</option>');
    });
}

function setSubClasses() {
    let dndClass = $('#dnd_class').val();
    $.ajax({
        type: 'GET',
        url: "/class/"+dndClass+"/showsubclassesbylevel/1",
        success: function (result) {
            if (result == 'ko') {
                $('#subclasses').hide();
            } else {
                $('#subclasses').show();
                new_options = JSON.parse(result);

                changeSelectOption('#sub_class', new_options);
                $('#subclass_label').text(new_options[0].archetype);
            }

        }
    });
}

