<template>
  <div>
    <table class="table table-sm table-striped table-bordered table-hover table-responsive-sm">
        <thead>
          <th>#</th>
          <th>Attribute</th>
          <th>Value</th>
        </thead>
        <tbody>
            <tr v-for="(ppt,index) in properties" :key="index">
                <td>{{index + 1}}</td>
                <td>{{ppt[0]}}</td>
                <td>{{ppt[1]}}</td>
          </tr>                     
        </tbody>
    </table>
    <div class="col-md-12">                
        <button  type="button" class="mr-2 btn btn-link btn-sm  float-right" @click="closeMe">Close</button>
    </div> 
  </div>
</template>

<script>
export default {
  props: {
    activity: Object,
  },

  data () {
      return {
        properties: [],
      }
  },
methods: {
  closeMe() {
      this.$bvModal.hide("activityDetails");
    },
},
 mounted: function() {

  this.properties = Object.entries(this.activity.properties)
 },
};
</script>

<style scoped>
</style>