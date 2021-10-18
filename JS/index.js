$( document ).ready(function() {
  get_cards();
});

let cards;

function get_cards(){
  var t0 = performance.now();

  document.getElementById('counterCard').innerHTML = 'Retrieving cards : IN PROGRESS';
  $.ajax({
      url : 'PROCESS/get_cards.php',
      dataType : 'json',
      success : function(result){
        var t1 = performance.now();
        document.getElementById('counterCard').innerHTML = 'Retrieving cards : DONE in '+(t1 - t0).toFixed(0)+' ms';

        cards = result;
        get_details();
     }
  });
}


let i = 0;

function get_details(){

  $.ajax({
      url : 'PROCESS/get_details.php',
      type : 'POST',
      data:
      {
        card: JSON.stringify(cards[i]),
        id: cards[i].id,
        count: i,
      },
      dataType : 'json',
      success : function(result){
        console.log(result)
        document.getElementById('counterDetails').innerHTML = 'Retrieving details : ' + (i+1) + ' / ' + cards.length + ' - ' +  (((i+1)*100)/cards.length).toFixed(2) + ' %';

        // document.getElementById('cardResult').innerHTML += "\n";
        // document.getElementById('cardResult').innerHTML += JSON.stringify(result, undefined, 2) +',';

        if (i < (cards.length-1)) {
            i++;
            get_details();
        }
     },
     error : function(){
       console.log(cards[i].id + ' / ' + i + ' : error ');

       if (i < (cards.length-1)) {
           i++;
           get_details();
       }
     }
  });
}
