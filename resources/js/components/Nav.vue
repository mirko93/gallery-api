<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <router-link to="/"><h1>Gallery App</h1></router-link>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      <li class="nav-item">
                          <a class="nav-link" href="/login">Login</a>
                      </li>
                  
                      <li class="nav-item">
                          <a class="nav-link" href="/register">Register</a>
                      </li>

                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              <router-link to="/author/1">Mirko Skopljak</router-link>
                          </a>

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
}
</script>

<style>

</style>