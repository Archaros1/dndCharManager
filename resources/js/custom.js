$(function () {
    console.log("ready !");

    let path = $(location).attr('pathname');
    if (path.startsWith("/character/create")) {
        setSubClasses();
        setSubRaces();

        $('#dnd_class').on("change", function () {
            setSubClasses();
        });
        $('#race').on("change", function () {
            setSubRaces();
        });
        setDescriptionsSpells()
    }

    if (path.startsWith("/character/show")) {
        if (path.endsWith("/features/spells")) {
            descDisplayer('spellInfo', 'spellDesc');
        }
        if (path.endsWith("/features/traits")) {
            descDisplayer('traitInfo', 'traitDesc');
        }
        if (path.endsWith("/features/actions")) {
            descDisplayer('actionInfo', 'actionDesc');
        }
    }
    if (path.startsWith("/character/rest/select")) {
        $('#typeRestChoice').on("change", function () {
            console.log('test');
            switch ($('#typeRestChoice').val()) {
                case 'short':
                    $('#shortRestForm').slideDown(300);
                    break;
                case 'long':
                    $('#shortRestForm').slideUp(300);
                    break;
                default:
                    break;
            }
        });
    }

});

function descDisplayer(buttonIdModel, descIdModel) {
    for (let i = 1; i < 1000; i++) {
        $('#'+buttonIdModel+'_' + i).on("click", function () {
            $('[id^="'+descIdModel+'_"][id!='+descIdModel+'_' + i + ']').slideUp(300);
            $('#'+descIdModel+'_' + i).slideToggle(300);
        });
    }
}

function setDescriptionsSpells() {
    for (let i = 1; i < 1000; i++) {
        if ($('#spell_choice_' + i).val()) {
            $.ajax({
                type: 'GET',
                url: "/spells/" + $('#spell_choice_' + i).val() + "/description",
                success: function (result) {
                    $('#description-choice-' + i).html(result);
                }
            });
            $('#spell_choice_' + i).on("change", function () {
                $.ajax({
                    type: 'GET',
                    url: "/spells/" + $('#spell_choice_' + i).val() + "/description",
                    success: function (result) {
                        $('#description-choice-' + i).html(result);
                    }
                });
            });
        }
    }
}

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

function switchToCase(caseName) {
    $('.case').hide();
    $('#' + caseName).show();
}
