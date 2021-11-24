<template>
 
      <div>
            <table border="1" cellpadding="2" cellspacing="2">
                <tbody>
                    <tr>
                            <td>
                                <label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                                    GeraeteID
                                </label>
                            </td>
                            <td>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="number" name="GeraeteID" v-model="geraeteID" placeholder="GeraeteID">
                            </td> 

                    </tr>
                    <tr>
                        <td><label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                                    StartZeitpunkt
                                </label> </td>
                        <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="StartZeitpunkt" v-model="StartZeitpunkt" placeholder="YYYY-mm-dd HH:ii"></td>
                    </tr>
                    <tr>
                        <td>
                            <label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                                    EndZeitpunkt
                                </label>
                        </td>
                        <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="datetime" name="EndZeitpunkt" v-model="EndZeitpunkt" placeholder="YYYY-mm-dd HH:ii"></td>
                    </tr>
                    <tr>
                        <td><label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                                    Wiederholungen
                                </label></td>
                        <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="number" name="Wiederholungen" v-model="Wiederholungen" placeholder="Anzahl der Bewegungen"></td>
                    </tr>
                    <tr>
                        <td><label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                                    Intensitaet
                                </label></td>
                        <td>
							<select name="Intensitaet" v-model="Intensitaet" size="1">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						</td>
                    </tr>
                    <tr>
                        <td colspan="2"><input @click="storeDeviceInformations()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit" value="Daten eintragen"></td>
                    </tr>
                </tbody>
            </table>  
            {{this.member}}
            <h1>----</h1>
            {{this.devices}}
      </div>
</template>
<script>
export default {
    data(){
        return{
            geraeteID:"",
            StartZeitpunkt:"",
            EndZeitpunkt:"",
            Wiederholungen:"",
            Intensitaet:"",
            member:'',
            devices:'',

        }
    },

    mounted(){
         axios.get('test')
                     .then((response)=>{
                       this.member = response.data
                       console.log(this.member)
                     });

        axios.get('getDevice')
                     .then((response)=>{
                       this.devices = response.data
                       console.log(this.devices)
                     });
            
    },

    methods:{
        log(){
            axios.get('test')
                        .then((response)=>{
                        this.member = response.data
                        console.log(this.member)
                        })
        },

        storeMemberInformations()
        {
        let data = new FormData();
        data.append("firstname","Tim");
        data.append("lastname", "Lyra");
        data.append("birthday","23.11.2021");
        axios.post("test2", data).then((response)=>{this.member = response.data})
        },

        storeDeviceInformations(){
            let data =  new FormData();
            data.append("description", "Latzug" )
            data.append("intensityfactor", 1 )
            data.append("totalmovementcounter", 1)
            data.append("maximumliftuptowarning", 1)
            data.append("basicforce", 1)
            data.append("carrera" , 1)

            axios.post("addDevice", data).then((response) => {
                this.devices = response.data;
                console.log("Added");
            })
        }


    }
}
</script>