<template>
  <div>
    <page-title
      :heading="heading"
      :subheading="subheading"
      :icon="icon"
    ></page-title>
    <div>
      <div>
        <profile :user="user" />
      </div>
    </div>
  </div>
</template>

<script>
import Main from "@/Layout/Wrappers/baseLayout";
import PageTitle from "@/Layout/Components/PageTitle";
import profile from "./profile";

export default {
  props: { 
    user: Object,
  },
  components: {
    PageTitle,
    profile,
  },
  data () {
    return{
    heading: "My Account",
    subheading: "Details about my account",
    icon: "pe-7s-lock icon-gradient bg-malibu-beach",
  }},
  layout: (h, page) => h(Main, [page]),
};
</script>

<style>
</style>
