$(function ($)
{
	var month = {
		"number": ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
		"short": ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
		"long": ["Enero", "Febrero", "Marzo", "Abri", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
	},
	today = new Date(), 
	todayYear = today.getFullYear(),
    todayMonth = today.getMonth() + 1,
    todayDay = today.getDate();
    updateTheBirthDayValue = function(options, $selector, selectedYear, selectedMonth, selectedDay) {
      if ((selectedYear * selectedMonth * selectedDay) != 0) {
        if (selectedMonth<10) selectedMonth="0"+selectedMonth;
        if (selectedDay<10) selectedDay="0"+selectedDay;
        hiddenDate = selectedYear + "-" + selectedMonth + "-" + selectedDay;
        $selector.val(hiddenDate);

        if (options.callback) {
          options.callback(hiddenDate);
        }
      }
    }
    generateBirthdayPicker = function ($parent, options) 
    {
      var parentId = $parent.attr('id').replace(/-/g, '');

    	// Create the html picker skeleton
      	var $fieldset = $("<fieldset class='birthdayPicker'><legend style='font-size:16px; font-weight:bold'>Fecha de nacimiento</legend></fieldset>"),
        	  $year = $("<select class='form-control birthYear "+options.sizeClass+"' name='"+parentId+"_birth[year]' id='"+parentId+"_birth[year]'></select>"),
          	$month = $("<select class='form-control birthMonth "+options.sizeClass+"' name='"+parentId+"_birth[month]' id='"+parentId+"_birth[month]'></select>"),
          	$day = $("<select class='form-control birthDate "+options.sizeClass+"' name='"+parentId+"_birth[day]' id='"+parentId+"_birth[day]'></select>")
          	$birthday = $("<input class='birthDay' name='"+parentId+"_birthDay' type='hidden'/>");

            $div1 = $("<div class='col-md-2' style='padding-left: 0px; padding-right: 5px' id='div1'><label for='fecha_nac_birth[day]'>Dia</label></div>");
            $div2 = $("<div class='col-md-3' style='padding-left: 0px; padding-right: 5px' id='div2'><label for='fecha_nac_birth[month]''>Mes</label></div>");
            $div3 = $("<div class='col-md-2' style='padding-left: 0px; padding-right: 0px' id='div3'><label for='fecha_nac_birth[year]''>Año</label></div>");


            
         // Add the option placeholders if specified
      	if (options.placeholder) {
        	$("<option value='0'>Año</option>").appendTo($year);
        	$("<option value='0'>Mes</option>").appendTo($month);
        	$("<option value='0'>Dia</option>").appendTo($day);
      	}

 		// Deal with the various Date Formats
      	if (options.dateFormat == "bigEndian") {
          $fieldset.append($year).append($month).append($day);
      	} else if (options.dateFormat == "littleEndian") {
        	$fieldset.append($day).append($month).append($year);
      	} else {
        	$fieldset.append($month).append($day).append($year);
     	}
     	//calculate the year to add to the select options. 
     	var yearBegin = todayYear - options.minAge; 
     	var yearEnd = todayYear - options.maxAge;
     	if (options.maxYear != todayYear && options.maxYear > todayYear) {
     		yearBegin = options.maxYear; 
     		yearEnd = yearEnd + (options.maxYear - todayYear)
     	}
     	for (var i = yearBegin; i >= yearEnd; i--) { 
     		$("<option></option>").attr("value", i).text(i).appendTo($year); 
     	}
     	for (var i = 0; i <= 11; i++) {
     		$("<option></option>").attr('value', i + 1).text(month[options.monthFormat][i]).appendTo($month);
     	}
     	for (var i = 1; i <= 31; i++) {
     		var number = (i < 10) ? "0"+i: i;
     		$("<option></option>").attr('value', i).text(number).appendTo($day);
     	}

        $fieldset.append($birthday);
        $parent.append($fieldset);
        // Set the default date if given
      	if (options.defaultDate) {
        	var date = new Date(options.defaultDate);
        	$year.val(date.getFullYear());
        	$month.val(date.getMonth() + 1);
        	$day.val(date.getDate());
          updateTheBirthDayValue(options, $birthday, date.getFullYear(), date.getMonth() + 1, date.getDate());
      	}
        $fieldset.on('change', function () 
        {
            $birthday = $(this).find('.birthDay');
        	// currently selected values
            selectedYear = parseInt($year.val(), 10),
            selectedMonth = parseInt($month.val(), 10),
            selectedDay = parseInt($day.val(), 10);
            //rebuild the index for the month. 
            var currentMaxMonth = $month.children(":last").val();
            if (selectedYear > todayYear) {
            	if (currentMaxMonth > todayMonth) {
            		while (currentMaxMonth > todayMonth) {
            			$month.children(":last").remove();
            			currentMaxMonth--;
            		}	
            	} 
            } else {
            	while (currentMaxMonth < 12) {
            		$("<option></option>").attr('value', parseInt(currentMaxMonth)+1).text(month[options.monthFormat][currentMaxMonth]).appendTo($month);
            		currentMaxMonth++;
            	}
            }

            var currentMaxDate = $day.children(":last").val(); 
            // number of days in currently selected year/month
            var actMaxDay = (new Date(selectedYear, selectedMonth, 0)).getDate();
            if (currentMaxDate > actMaxDay) {
            	while (currentMaxDate > actMaxDay) {
            		$day.children(":last").remove(); 
            		currentMaxDate--;
            	}
            } else if (currentMaxDate < actMaxDay ) {
            	while (currentMaxDate < actMaxDay) 
            	{
            		var dateIndex = parseInt(currentMaxDate) + 1; 
            		var number = (dateIndex < 10) ? "0"+dateIndex: dateIndex;
     				$("<option></option>").attr('value', dateIndex).text(number).appendTo($day);
            		currentMaxDate++;
            	}
            }
            // update the hidden date
            updateTheBirthDayValue(options, $birthday, selectedYear, selectedMonth, selectedDay);
        });


            $fieldset.append($div1);
            $fieldset.append($div2);
            $fieldset.append($div3);
           
            $div1.append($day);
            $div2.append($month);
            $div3.append($year);

           

    }

    $.fn.birthdayPicker = function(options) 
	{
		return this.each(function () {
        	var settings = $.extend($.fn.birthdayPicker.defaults, options );
        	generateBirthdayPicker($(this), settings);
         
		});
	};

	$.fn.birthdayPicker.defaults = {
    	  "maxAge"        : 100,
      	"minAge"        : 0,
      	"maxYear"       : todayYear,
      	"dateFormat"    : "littleEndian",
      	"monthFormat"   : "long",
      	"placeholder"   :  true,
      	"defaultDate"   : false,
      	"sizeClass"		: "span2",
        'callback': false
	} 
}( jQuery ))