<template>
  <div>
    <div class="h-100 bg-plum-plate bg-animation">
      <div class="d-flex h-100 justify-content-center align-items-center">
        <b-col md="8" class="mx-auto app-login-box">
          <div class="text-center">
            <img src="/logo/logo-black.png" style="width:100px;"/>
          </div>
          <!-- <div class="app-logo-inverse mx-auto mb-3" /> -->
          <b-form @submit.prevent="submit">
            <div class="modal-dialog w-100 mx-auto">
              <div class="modal-content" style="border-radius:5%">
                <div class="modal-body">
                  <div class="h5 modal-title text-center">
                    <h4 class="mt-2">
                      <div>
                        <strong class="text-primary font-bold font-display text-center">Create a Secure Account</strong>
                        <div>
                          <strong style="font-size:14px;">welcome to save to invest</strong>
                        </div>
                      </div>
                    </h4>
                  </div>
                  <b-form-group
                    id="authnameInputGroup"
                    label-for="authnameInput"
                    description=""
                  >
                    <b-form-input
                      id="authnameInput"
                      type="text"
                      v-model="form.name"
                      required
                      placeholder="Enter Fullname"
                      :state="
                        errors.name && errors.name.length > 0 ? false : null
                      "
                      aria-describedby="authnameInputFeedback"
                    >
                    </b-form-input>
                    <b-form-invalid-feedback id="authnameInputFeedback">
                      {{ errors.name }}
                    </b-form-invalid-feedback>
                  </b-form-group>

                  <b-form-group
                    id="authEmailInputGroup"
                    label-for="authEmailInput"
                  >
                    <b-form-input
                      id="authEmailInput"
                      type="email"
                      v-model="form.email"
                      required
                      placeholder="Enter email address"
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
                    id="authphoneInputGroup"
                    label-for="authphoneInput"
                    description=""
                  >
                    <b-form-input
                      id="authphoneInput"
                      type="text"
                      v-model="form.phone"
                      required
                      placeholder="Enter Phone Number"
                      :state="
                        errors.name && errors.phone.length > 0 ? false : null
                      "
                      aria-describedby="authphoneInputFeedback"
                    >
                    </b-form-input>
                    <b-form-invalid-feedback id="authphoneInputFeedback">
                      {{ errors.phone }}
                    </b-form-invalid-feedback>
                  </b-form-group>

                  <!-- <b-form-group
                    id="authmNameInputGroup"
                    label-for="authmNameInput"
                    description=""
                  >
                    <b-form-input
                      id="authmNameInput"
                      type="text"
                      v-model="form.mname"
                      required
                      placeholder="Enter Middle name"
                      :state="
                        errors.mname && errors.mname.length > 0 ? false : null
                      "
                      aria-describedby="authmNameInputFeedback"
                    >
                    </b-form-input>
                    <b-form-invalid-feedback id="authmNameInputFeedback">
                      {{ errors.mname }}
                    </b-form-invalid-feedback>
                  </b-form-group> -->

                  

                  <b-form-group
                    id="authPasswordInputGroup"
                    label-for="authPasswordInput"
                  >
                    <b-form-input
                      id="authPasswordInput"
                      type="password"
                      v-model="form.password"
                      required
                      :state="
                        errors.password && errors.password.length > 0
                          ? false
                          : null
                      "
                      aria-describedby="authPasswordInputFeedback"
                      placeholder="Enter password..."
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

                  <div class="divider" />
                  <h6 class="mb-0">
                    Already have an account?
                    <inertia-link class="text-primary" :href="route('login')"
                      >Login</inertia-link
                    >
                  </h6>
                </div>
                <div class="modal-footer clearfix">
                  <div class="float-left">
                    <inertia-link
                      class="btn-lg btn btn-link"
                      :href="route('login')"
                      >cancel</inertia-link
                    >
                  </div>
                  <div class="float-right">
                    <b-button variant="primary" type="submit" size="lg"
                      >Create Account</b-button
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
  },
  data() {
    return {
      form: {
        phone: null,
        name: null,
        // mname: null,
        email: null,
        password: null,
        password_confirmation: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route("register"), this.form);
    },
  },
};
</script>

<style>
</style>
