<template>
  <div>
    <div class="h-100 bg-plum-plate bg-animation">
      <div class="d-flex h-100 justify-content-center align-items-center">
        <b-col md="8" class="mx-auto app-login-box">
          <div class="text-center">
            <img src="/logo/logo-black.png" style="width:100px;"/>
          </div>
          <!-- <div class="app-logo-inverse mx-auto mb-3" /> -->
          <div class="modal-dialog w-100 mx-auto">
            <div class="modal-content">
              <div class="modal-body">
                <div class="h5 modal-title text-center">
                  <h4 class="mt-2">
                    <div class="text-primary font-bold font-display text-center">Account Email Verification,</div>
                  </h4>
                </div>
                <div v-if="resent" class="alert alert-success" role="alert">
                  A fresh verification link has been sent to your email address.
                </div>
                Before proceeding, please check your email for a verification
                link. If you did not receive the email
                <inertia-link
                  :href="route('verification.send')"
                  class="btn-lg btn btn-link"
                  method="post"
                  as="button"
                  type="button"
                  >click here to request another</inertia-link
                >
              </div>
            </div>
          </div>
          <div class="text-center text-white opacity-8 mt-3">
            Copyright &copy; Repzlaw 2022
          </div>
        </b-col>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    errors: Object,
    resent: Boolean,
  },
  data() {
    return {};
  },
  methods: {},
};
</script>

<style>
</style>
