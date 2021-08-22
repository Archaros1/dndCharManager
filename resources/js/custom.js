$(function () {
    console.log("ready !");

    setSubClasses();
    setSubRaces();

    $('#dnd_class').change(function () {
        setSubClasses();
    });
    $('#race').change(function () {
        setSubRaces();
    });

});

function changeSelectOption(yourSelectList, new_options) {
    /* Remove all options from the select list */
    $(yourSelectList).empty();

    /* Insert the new ones from the array above */
    new_options.forEach(option => {
        $(yourSelectList).append('<option value="' + option.id + '">' + option.name + '</option>');
    });
}

function setSubClasses() {
    let dndClass = $('#dnd_class').val();
    $.ajax({
        type: 'GET',
        url: "/class/" + dndClass + "/showsubclassesbylevel/1",
        success: function (result) {
            if (result == 'ko' || result == '[]') {
                $('#subclasses').hide();
                $('#subclasse').val(null);
            } else {
                $('#subclasses').show();
                new_options = JSON.parse(result);

                changeSelectOption('#sub_class', new_options);
                $('#subclass_label').text(new_options[0].archetype);
            }

        }
    });
}

function setSubRaces() {
    let race = $('#race').val();
    console.log(race);
    $.ajax({
        type: 'GET',
        url: "/race/" + race + "/showsubraces",
        success: function (result) {
            if (result == 'ko' || result == '[]') {
                $('#subraces').hide();
                $('#subrace').val(null);
            } else {
                $('#subraces').show();
                new_options = JSON.parse(result);
                new_options.forEach(element => {
                    element.name = capitalizeFirstLetter(element.name);
                });

                changeSelectOption('#subrace', new_options);
                $('#subrace_label').text(new_options[0].archetype);
            }

        }
    });
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }
