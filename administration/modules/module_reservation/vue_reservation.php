<?php

    class VueReservation extends VueGenerique {

    public function __construct(){
        parent::__construct();
    }

    public function gérerUtilisateur(){
        $this->genererCalendrier();
    }

    public function genererBody(){
        echo "
            <div class='container my-5' >

                <div class='card'>

                    <div class='card-header py-4 px-5 bg-light border-0'>
                        <h4 class='mb-0 fw-bold'>Gestion des réservations</h4>
                    </div>

                    <div class='card-body px-5'>
                    <p>SEEEEEEEEEEEEEEEEEEXE</p>" .

                        $this->genererCalendrier() . "

                    </div>
                </div>
            </div>
        ";
    

    }
    public function genererCalendrier(){
        echo '

        <div id="app">
        <v-app id="inspire">
          <v-row>
            <v-col>
              <v-sheet height="400">
                <v-calendar
                  ref="calendar"
                  :now="today"
                  :value="today"
                  :events="events"
                  color="primary"
                  type="week"
                ></v-calendar>
              </v-sheet>
            </v-col>
          </v-row>
        </v-app>
      </div>
      <script>
        new Vue({
      el: "#app",
      vuetify: new Vuetify(),
      data: () => ({
        today: "2019-01-08",
        events: [
          {
            name: "Weekly Meeting",
            start: "2019-01-07 09:00",
            end: "2019-01-07 10:00",
          },
          {
            name: "Thomas\' Birthday",
            start: "2019-01-10",
          },
          {
            name: "Mash Potatoes",
            start: "2019-01-09 12:30",
            end: "2019-01-09 15:30",
          },
        ],
      }),
      mounted () {
        this.$refs.calendar.scrollToTime("08:00")
      },
    });
  </script>
        ';
    }
}
?>
