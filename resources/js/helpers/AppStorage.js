class AppStorage {
    storeToken(token){
        localStorage.setItem('token',token);
    }

    storeUser(user){
        localStorage.setItem('user',user);
    }
    storeEmail(email){
        localStorage.setItem('email',email);
    }
    storeGuard(guard){
        localStorage.setItem('guard',guard);
    }
    store(token,user,guard,email){
        this.storeToken(token);
        this.storeUser(user);
        this.storeGuard(guard);
        this.storeEmail(email);

    }

    getToken(){
        localStorage.getItem('token');
    }
    getUser(){
        localStorage.getItem('user');
    }
    getEmail(){
        localStorage.getItem('email');
    }
    clear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        localStorage.removeItem('guard');
        localStorage.removeItem('email');

    }
}
export default AppStorage = new AppStorage();
