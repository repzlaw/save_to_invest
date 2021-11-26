<template>
  <div>
    <div class="h-100 bg-plum-plate bg-animation">
      <div class="d-flex h-100 justify-content-center align-items-center">
        <b-col md="8" class="mx-auto app-login-box">
          <div class="text-center">
            <img src="logo/logo-black.png" style="width:100px;"/>
          </div>
          <!-- <div class="app-logo-inverse mx-auto mb-3" /> -->
          <b-form @submit.prevent="submit">
            <div class="modal-dialog w-100 mx-auto">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="h5 modal-title text-center">
                    <h4 class="mt-2">
                      <div>Reset Password,</div>
                    </h4>
                  </div>
                  <input type="hidden" v-model="form.token" name="token" />
                  <b-form-group
                    id="authEmailInputGroup"
                    label-for="authEmailInput"
                    description="Provide a valid email"
                  >
                    <b-form-input
                      id="authEmailInput"
                      type="email"
                      v-model="form.email"
                      required
                      placeholder="Enter email..."
                      :state="
                        errors.email && errors.email.length > 0 ? false : null
                      "
                      aria-describedby="authEmailInputFeedback"
                    >
                    </b-form-input>
                    <b-form-invalid-feedback id="authEmailInputFeedback">
                      {{ errors.email }}
                    </b-form-invalid-feedback>
                  </b-form-group>

                  <b-form-group
                    id="authPasswordInputGroup"
                    label-for="authPasswordInput"
                  >
                    <b-form-input
                      id="authPasswordInput"
                      type="password"
                      v-model="form.password"
                      required
                      autocomplete="new-password"
                      :state="
                        errors.password && errors.password.length > 0
                          ? false
                          : null
                      "
                      aria-describedby="authPasswordInputFeedback"
                      placeholder="New Password"
                    >
                    </b-form-input>
                    <b-form-invalid-feedback id="authPasswordInputFeedback">
                      {{ errors.password }}
                    </b-form-invalid-feedback>
                  </b-form-group>

                  <b-form-group
                    id="authPasswordConfirmInputGroup"
                    label-for="authPasswordConfirmInput"
                  >
                    <b-form-input
                      id="authPasswordConfirmInput"
                      type="password"
                      v-model="form.password_confirmation"
                      required
                      autocomplete="new-password"
                      aria-describedby="authPasswordConfirmInputFeedback"
                      placeholder="Confirm password..."
                    >
                    </b-form-input>
                  </b-form-group>
                </div>
                <div class="modal-footer clearfix">
                  <div class="float-right">
                    <b-button variant="primary" type="submit" size="lg"
                      >Reset Password</b-button
                    >
                  </div>
                </div>
              </div>
            </div>
          </b-form>

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
    request: String,
  },
  data() {
    return {
      form: {
        email: null,
        password: null,
        token: null,
        password_confirmation: null,
      },
    };
  },
  methods: {
    submit() {
      this.form.token = this.request;
      this.$inertia.post(route("password.update"), this.form);
    },
  },
  mounted() {
    console.log("request", this.request);
  },
};
</script>

<style>
</style>
