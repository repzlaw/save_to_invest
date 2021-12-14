<template>
  <div>
    <page-title
      :heading="heading"
      :subheading="subheading"
      :icon="icon"
    ></page-title>
    <div>
      <div>
        <realEstate />
      </div>
    </div>
  </div>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";
import realEstate from "./realEstate";

export default {
  props: {
  },
  components: {
    PageTitle,
    realEstate,
  },
  data () {
    return{
    heading: "Real Estate Savings",
    subheading: "Real Estate Savings Account",
    icon: "lnr-apartment icon-gradient bg-malibu-beach",
  }},
  layout: (h, page) => h(Main, [page]),
};
</script>


