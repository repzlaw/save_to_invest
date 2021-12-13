<template>
  <div>
    <page-title
      :heading="heading"
      :subheading="subheading"
      :icon="icon"
    ></page-title>
    <div>
      <div>
        <savings  />
      </div>
    </div>
  </div>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";
import savings from "./savings";

export default {
  props: {
    user: Object,
  },
  components: {
    PageTitle,
    savings,
  },
  data () {
    return{
    heading: "My Savings",
    subheading: "Lets see how well you are doing 😊",
    icon: "fa fa-bullseye icon-gradient bg-malibu-beach",
  }},
  layout: (h, page) => h(Main, [page]),
};
</script>


