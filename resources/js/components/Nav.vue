<template>
  <div>
    <nav class="bg-white shadow-sm navbar navbar-expand-md navbar-light">
            <div class="container">
                <router-link to="/"><h1>Gallery App</h1></router-link>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
                      <!-- Authentication Links -->
                      <li class="nav-item">
                          <a class="nav-link" href="/login">Login</a>
                      </li>
                  
                      <li class="nav-item">
                          <a class="nav-link" href="/register">Register</a>
                      </li>

                      <li class="nav-item dropdown">
                        <router-link :to="'/users/' + user.data.user_id">Mirko Skopljak</router-link>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/logout">Logout</a>
                          </div>
                      </li>
                    </ul>
                </div>
            </div>
        </nav>
  </div>
</template>

<script>
export default {
    name: "Nav",

    data: () => {
        return {
            user: null,
        }
    },

    mounted() {
        axios.get('/api/auth-user')
            .then((result) => {
                this.user = result.data;
            })
            .catch((err) => {
                console.log('Unable to fetch auth user');
            });
    }
}
</script>

<style>

</style>