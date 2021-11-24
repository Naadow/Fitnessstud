<template>
     <table border="1" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>
                <td><label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                            Geräte Beschreibung
                        </label> </td>
                <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="description" v-model="description" placeholder="description"></td>
            </tr>

            <tr>
                <td><label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                            Intensitätsfaktor
                        </label> </td>
                <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="intensityfactor" v-model="intensityfactor" placeholder="intensityfactor"></td>
            </tr>

                <tr>
                <td><label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                            Maximale Huebe bis Warnung
                        </label> </td>
                <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="maximumliftuptowarning" v-model="maximumliftuptowarning" placeholder="maximumliftuptowarning"></td>
            </tr>

                <tr>
                <td><label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                            Grundkraft
                        </label> </td>
                <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="basicforce" v-model="basicforce" placeholder="basicforce"></td>
            </tr>

                <tr>
                <td><label class="appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="password">
                            Hubweg
                        </label> </td>
                <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="carrera" v-model="carrera" placeholder="carrera"></td>
            </tr>
            
            <tr>
                <td colspan="2"><input @click="storeDeviceInformations()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit" value="Daten eintragen"></td>
            </tr>
        </tbody>
    </table>  

</template>

<script>
import Vuetable from "vuetable-2";

export default {
      components: {
    Vuetable,},
    data(){
        return{
            description:"",
            intensityfactor:"",
            totalmovementcounter:"",
            maximumliftuptowarning:"",
            basicforce:"",
            carrera:'',
        }
    },

    methods:{
        storeDeviceInformations(){
            let data = new FormData();
            data.append("description", this.description)
            data.append("intensityfactor", this.intensityfactor)
            data.append("maximumliftuptowarning", this.maximumliftuptowarning)
            data.append("basicforce", this.basicforce)
            data.append("carrera", this.carrera)
            data.append("totalmovementcounter", 0)
            axios.post("addDevice", data).then((response) => {
                this.devices = response.data;
                console.log("Added");
            })
        }
    }
}

</script>