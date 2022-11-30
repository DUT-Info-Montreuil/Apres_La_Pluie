$(document).ready(function(){
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data: () => ({
      today: récupérerJourActuel(),
      events: [
        {
          name: 'Réservé',
          start: '2019-01-07 09:00',
          end: '2019-01-07 10:00',
        },
        {
          name: 'Congé',
          start: '2019-01-10 00:00',
          end: '2019-01-10 23:59'
        },
        {
          name: 'Réservé',
          start: '2019-01-09 12:30',
          end: '2019-01-09 15:30',
        },
      ],
    }),
    mounted () {
      this.$refs.calendar.scrollToTime('08:00')
    },
  });

});

function afficherCalendrier(){
  $.ajax({
    method: "POST",
        url:"./js/fonction-ajax.php",
        data:{
            nomFonction: 'barDeRecherche'
        },
        dataType : 'json'
  })
  .done(function( resultat ){
    console.log(resultat);
  });

  let gne = "{start: '2019-01-07 09:00',end: '2019-01-07 10:00',},{start: '2019-01-10',},{start: '2019-01-09 12:30',end: '2019-01-09 15:30',},";
  return JSON.parse(gne);
}

function récupérerJourActuel(){
  let dateObj = new Date();
  let month = String(dateObj.getMonth() + 1).padStart(2, '0');
  let day = String(dateObj.getDate()).padStart(2, '0');
  let year = dateObj.getFullYear();
  let output = year + '-' + month + '-' + day;
  return output;
}