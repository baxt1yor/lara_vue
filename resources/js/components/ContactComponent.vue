<template>
    <div class="container">
        <div v-if="success" class="alert alert-success">
            {{ message }}
        </div>
        <div v-if="err" class="alert alert-danger">
            {{err_msg}}
        </div>
        <form method="post" @submit.prevent="feedbackSend" >
          <div class="form-group">
            <label for="email">Email</label>
            <input v-model="form.email" type="email" class="form-control" id="email" aria-describedby="emailHelp"
            :class="{ 'is-invalid': form.errors.has('email') }"
            placeholder="Email">
             <has-error :form="form" field="email"></has-error>
          </div>
          <div class="form-group">
            <label for="Phone">Phone</label>
            <input v-model="form.phone" type="tel"  pattern="[+]{1}[0-9]{11}"   class="form-control"
            :class="{ 'is-invalid': form.errors.has('phone') }"
            id="phone" placeholder="Phone">
             <has-error :form="form" field="phone"></has-error>
          </div>
           <div class="form-group">
            <label for="message">Message</label>
            <textarea v-model="form.message" class="form-control" placeholder="Your message" id="message" 
            :class="{ 'is-invalid': form.errors.has('message') }"
            rows="3"></textarea>
            <has-error :form="form" field="message"></has-error>
          </div>
          <button :disabled="form.busy" type="submit" id="button" class="btn btn-primary">Send message</button>
        </form>
    </div>
</template>

<script>
    import Vue from 'vue'
    import { Form, HasError, AlertError } from 'vform'

    Vue.component(HasError.name, HasError)
    Vue.component(AlertError.name, AlertError)
    
    export default {
        data () {
            return {
                form : new Form({
                    'email' : '',
                    'phone' : '',
                    'message' : ''
                }),
                success: false,
                err : false,
                message : '',
                err_msg: ''
            }
        },

        methods: {
            feedbackSend(){
                this.form.post('/feedback')
                .then(({ data }) => { this.message = data.message; this.success = true; })
                .catch(err => { this.err = true; this.err_msg = err});
            }
        }
    }
</script>
