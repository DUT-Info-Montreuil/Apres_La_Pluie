$(document).ready(function(){

  new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data: () => ({
      today: '2019-01-08',
      events: [afficherCalendrier()],
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
            nomFonction: 'modifierRole'
        },
        dataType : 'json'
  })
  .done(function( resultat ){
    return resultat;
  });
}