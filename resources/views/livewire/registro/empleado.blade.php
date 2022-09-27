    <div>
        <x-menubar.headermenu nameform="Registro / Empleado"/>
            <form action="#" method="POST">
                    <div class="space-y-3 bg-white px-4 py-5 sm:p-6">
                        <x-html.headinghtml>
                            Datos personales
                        </x-html.headinghtml>
                        <div class="flex items-start  mb-4 ">
                            <div class="relative w-1/2 mr-3">
                                <div class="relative">
                                    <x-html.inputtexhtml  id="phone" label="Nombre."/>
                                </div>
                                @if($errors->has('phone'))
                                    <div class="mt-0.5">
                                        <x-jet-input-error message="{{ $errors->first('phone') }}"></x-jet-input-error>
                                    </div>
                                @endif
                            </div>
                            <div class="relative w-1/2" >
                                <div class="relative ">
                                    <x-html.inputtexhtml  id="zipcode" label="Apellido."/>
                                </div>

                            </div>
                        </div>
                        <div class="flex items-start  mb-4 ">
                            <div class="relative w-1/2 mr-3">
                                <div class="relative">
                                    <x-html.inputtexhtml  id="phone" label="DNI."/>
                                </div>
                                @if($errors->has('phone'))
                                    <div class="mt-0.5">
                                        <x-jet-input-error message="{{ $errors->first('phone') }}"></x-jet-input-error>
                                    </div>
                                @endif
                            </div>
                            <div class="relative w-1/2">
                                <div class="relative ">
                                    <x-html.inputtexhtml  id="zipcode" label="CUIL."/>
                                </div>

                            </div>
                        </div>
                        <div class="flex items-start  mb-4 ">
                            <div class="relative w-1/2 mr-3">
                                <div class="relative">
                                    <x-html.inputtexhtml  id="phone" label="Dirección."/>
                                </div>
                                @if($errors->has('phone'))
                                    <div class="mt-0.5">
                                        <x-jet-input-error message="{{ $errors->first('phone') }}"></x-jet-input-error>
                                    </div>
                                @endif
                            </div>
                            <div class="relative w-1/2">
                                <div class="relative ">
                                    <x-html.inputtexhtml  id="zipcode" label="Teléfono."/>
                                </div>

                            </div>
                        </div>
                        <div>
                            <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                            <div class="mt-1">
                                <textarea id="about" name="about" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com"></textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Photo</label>
                            <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                </span>
                                <button type="button" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Change</button>
                            </div>
                        </div>


                    </div>
                    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                    </div>

            </form>

</div>