/**
 * Created by ntokozo on 2017/06/26.
 */


$(document).ready(function() {
   /*  $('#monthly').DataTable({
        responsive: true
    }); */

    $("#ddEmploymentStatus").dropdown();
    $("#province").dropdown();


    /*THIS IS WHERE THE HIGH-CHARTS GO IN*/
   /*  $(function () {
        $('#MR').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Monthly Paying Reports'
            },
            xAxis: {
                categories: ['Monthly', 'Quarterly', 'Yearly','Total Congregation']
            },
            yAxis: {
                title: {
                    text: 'Fruit eaten'
					}
            },
            series:
            [
                {
                    name: 'Paying',
                    data: [1, 0, 4]
                },
                {
                    name: 'Non Paying',
                    data: [5, 7, 3]
                }
            ],
        });
    }); */
    /*THIS IS WHERE THEY END**/

    /*THE LEFT MENU FUNCTIONS END HERE*/
	 var toggleMenu = function() {
	  $('header').toggleClass('toggle');
	  $('.main').toggleClass('push');
	  $('.overlay').toggleClass('block');
	  $('#social, .logo').toggleClass('reveal');
  };

	//Nav
	$('.navBtn').click(function() {
    toggleMenu();
	});

  // Mousetrap.bind('esc', function() {
    // toggleMenu();
  // });
	
});