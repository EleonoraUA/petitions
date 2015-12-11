
<div id="chart"> </div>
<script type="text/javascript" src="/petitions/views/js/jquery-2.1.4.min.js"></script>
<script src='http://cdn.zingchart.com/zingchart.min.js'></script>
<script>

	$(document).ready(function(){
		$.ajax({
			type: 'GET',
            dataType: 'json',
            url: '/petitions/core/statistics.php',
            success: function(result) {
            	console.log(result);
               var chartData={
		    "type": "bar",
		    "legend":{ 
            "header":{
              "text":"Позначення"
            },
            "max-items":3,
            "overflow":"scroll",
            "highlight-plot":true,
            "minimize":true,
            "draggable":true
        },
		    "scale-y":{
			    "line-color":"#29A2CC",
			    "label":{
			      "text":"Кількість петицій"
			    }
			},
			"scale-x":{
			    "line-color":"#29A2CC"
			},
		    "title":{
		            "text":"Статистика петицій",
		            "position":"0% 0%",
		            "margin-top":10,
		            "margin-right":0,
		            "margin-left":0,
		            "margin-bottom":10
		        },
		  	"plot":{
		    	"animation":{
		      "effect":"ANIMATION_SLIDE_BOTTOM",
		      "method":"3",
		      "sequence":"ANIMATION_BY_PLOT",
		      "speed":1,
		    },
		     /* Bar Fill by Node */
		  	},
		  	"series": [
			    {
			       "text": "Усі",
			       "values":[result.all],
			       "color": "black"
			    },
			    {
			       "text": "На розгляді",
			       "values":[result.process]
			    },
			    {
			       "text": "Із віповіддю",
			       "values":[result.answer]
			    }
		    ]
		  };
		  zingchart.render({ 
		    id:'chart',
		    data:chartData,
		    height:500,
		    width:"40%"
		  });
		            }
				});
		
	});
	
</script>