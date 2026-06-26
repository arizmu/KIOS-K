 <div x-data="tellerIndex"
     class="card bg-gradient-to-br from-base-100 to-primary/5 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-success/20">
     <div class="card-body p-5">
         <div class="flex items-center justify-between mb-4">
             <div class="flex items-center gap-2">
                 <div class="p-2 bg-gradient-to-br from-success to-success/70 rounded-lg">
                     <span class="icon-[tabler--cash] size-4 text-white"></span>
                 </div>
                 <h2 class="card-title text-sm font-semibold">Loket Saya</h2>
             </div>
             <div class="flex items-center gap-2" x-show="isActive">
                 <span class="relative flex h-3 w-3">
                     <span
                         class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success opacity-75"></span>
                     <span class="relative inline-flex rounded-full h-3 w-3 bg-success"></span>
                 </span>
                 <span class="badge badge-success badge-xs">Aktif</span>
             </div>
         </div>
         <div class="">
             <div class="flex justify-between items-center gap-4">
                 <div class="felx flex-col gap-6">
                     <template x-for="teller in tellers" :key="teller.id">
                         <div class="flex items-start gap-3">
                             <input x-model="loket[teller.id]" :value="teller.loket" type="radio" name="radio-1"
                                 class="radio radio-primary mt-2" :disabled="teller.is_active == 1" />
                             <label class="label-text cursor-pointer flex flex-start flex-col" for="radioDelete">
                                 <span class="text-base uppercase font-semibold text-gray-400"
                                     x-text="teller.loket"></span>
                                 <span class="text-xs font-semibold"
                                     :class="teller.is_active ? 'text-success' : 'text-error'"
                                     x-text="teller.is_active ? 'Aktif' : 'Tidak Aktif'"></span>

                             </label>
                         </div>
                     </template>
                 </div>
                 <div class="text-center" x-show="isActive">
                     <div class="inline-flex p-4 bg-gradient-to-br from-success/20 to-success/5 rounded-2xl mb-3">
                         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                             <path d="M0 0h24v24H0z" fill="none" />
                             <g fill="none">
                                 <path
                                     d="M3 12h4v6H5c-1.105 0-2-.827-2-1.846zm18 0h-4v6h2c1.105 0 2-.827 2-1.846zm-10.75 9.5a.75.75 0 0 1 .75-.75h2a.75.75 0 0 1 0 1.5h-2a.75.75 0 0 1-.75-.75" />
                                 <path stroke="currentColor" stroke-width="2"
                                     d="M21 12v-1a9 9 0 1 0-18 0v1m18 0h-4v6h2c1.105 0 2-.827 2-1.846zM3 12h4v6H5m-2-6v4.154C3 17.174 3.895 18 5 18m5.25 3.5H8a3 3 0 0 1-3-3V18m5.25 3.5c0 .414.336.75.75.75h2a.75.75 0 0 0 0-1.5h-2a.75.75 0 0 0-.75.75Z" />
                             </g>
                         </svg>

                     </div>
                     <div class="mb-3">
                         <p class="text-2xl font-bold text-base-content uppercase" x-text="myLoket.loket_name"></p>
                         <p class="text-xs font-semibold text-gray-400">Loket Saya</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="card-footer bg-base-200">
         <div class="flex gap-2">
             <button @click="isActive ? tutupLoket() : bukaLoket()" class="btn flex-1"
                 :class="isActive ? 'btn-error' : 'btn-success'">
                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                     <path d="M0 0h24v24H0z" fill="none" />
                     <g fill="none">
                         <path stroke="currentColor" stroke-linejoin="round" stroke-width="1.387"
                             d="M14.775 2.75a6.475 6.475 0 1 1-3.38 11.998c-.137-.085-.32.011-.32.173v1.129a1.5 1.5 0 0 1-1.5 1.5h-1.2a1 1 0 0 0-1 1v1.2a1.5 1.5 0 0 1-1.5 1.5H4.25a1.5 1.5 0 0 1-1.5-1.5v-2.297a2 2 0 0 1 .586-1.414l4.566-4.566c.376-.376.511-.923.446-1.452a6.475 6.475 0 0 1 6.427-7.271Z" />
                         <circle cx="15.5" cy="8.5" r="1.75" fill="currentColor" />
                     </g>
                 </svg>
                 <span x-text="isActive ? 'Tutup Loket' : 'Buka Loket'">Buka Loket</span>
             </button>
         </div>
     </div>
 </div>

 @push('js')
     <script>
         function tellerIndex() {
             return {
                 isActive: false,
                 myLoket: {
                     loket_id: "",
                     loket_name: ""
                 },
                 loket: [],
                 tellers: [],
                 async getLoket() {
                     const loket = await this.$httpGet('/teller/loket', {});
                     this.tellers = loket;
                 },

                 async bukaLoket() {
                     try {
                         const dataStore = {
                             "loket_id": "",
                             "loket_name": ""
                         }
                         const objectData = this.loket;
                         dataStore.loket_id = Object.keys(objectData)[0];
                         dataStore.loket_name = Object.values(objectData)[0];
                         const response = await this.$httpPost('/teller/buka-loket', dataStore);
                         this.loket = []
                         this.getLoket();
                         this.getMyLoketActive();
                         alert('Loket Berhasil Dibuka');
                     } catch (error) {
                         console.error(error);
                     }
                 },

                 async tutupLoket() {
                     try {
                         const response = await this.$httpPost('/teller/tutup-loket', this.myLoket);
                         this.getMyLoketActive();
                         this.getLoket();
                         alert('Loket Berhasil Ditutup');
                     } catch (error) {
                         console.error(error);
                     }
                 },

                 async getMyLoketActive() {
                     this.isActive = false;
                     this.myLoket.loket_id = "";
                     this.myLoket.loket_name = "";
                     const myLoket = await this.$httpGet('/teller/my-loket-active', {});
                     const data = myLoket.response.data;

                     this.myLoket.loket_id = data.id;
                     this.myLoket.loket_name = data.loket;
                     this.isActive = data.status;
                 },

                 init() {
                     this.getLoket();
                     this.getMyLoketActive();
                 }
             }
         }
     </script>
 @endpush
