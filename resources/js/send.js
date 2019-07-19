class Send {
   

    async post (url,data) {
        try {
            return await axios.post(url,data);
        }catch(error) {
            console.log(error);
        }
    };
    

}
export default new Send()