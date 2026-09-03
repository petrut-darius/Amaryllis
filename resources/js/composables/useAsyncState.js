import { ref } from "vue";

export function useAsyncState() {
    const status = ref("idle");
    const error = ref(null);

    async function run(promiseFn, { emptyCheck } = {}) {
        status.value = "loading";
        error.value = null;
        
        try {
            const result = await promiseFn()

            if(emptyCheck ? emptyCheck(result) : false) {
                status.value = "empty";
            }else{
                status.value = "success";
            }
            return result;
        } catch(e) {
            status.value = "error";
            error.value = e;
            window.reportError?.(e);
            throw e;
        }

    }
    
    return {status, error, run}
};