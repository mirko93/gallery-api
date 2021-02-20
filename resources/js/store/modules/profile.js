const state = {
    user: null,
    userStatus: null,
    posts: null,
    postsStatus: null,
};

const getters = {
    user: state => {
        return state.user;
    },

    userStatus: state => {
        return state.userStatus;
    },

    posts: state => {
        return state.posts;
    },

    postsStatus: state => {
        return state.postsStatus;
    },

};

const actions = {
    fetchUser({commit, dispatch}, userId) {
        commit('setUserStatus', 'loading');

        axios.get('/api/users/' + userId)
            .then((result) => {
                commit('setUser', result.data);
                commit('setUserStatus', 'success');
            })
            .catch((err) => {
                commit('setUserStatus', 'error');
            });
    },

    fetchUserPosts({commit, dispatch}, userId) {
        commit("setPostsStatus", 'loading');

        axios.get('/api/users/' + userId + '/posts')
            .then((result) => {
                commit('setPosts', result.data);
                commit('setPostsStatus', 'success');
            })
            .catch((err) => {
                commit('setPostsStatus', 'error');
            });
    }
};

const mutations = {
    setUser(state, user) {
        state.user = user;
    },

    setPosts(state, posts) {
        state.posts = posts;
    },

    setUserStatus(state, status) {
        state.userStatus = status;
    },

    setPostsStatus(state, status) {
        state.postsStatus = status;
    }
};

export default {
    state, getters, actions, mutations,
}