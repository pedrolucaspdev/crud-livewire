<div>
  <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center mt-5">
    <div class="container max-w-screen-lg mx-auto">
      <div>
        <h2 class="font-semibold text-xl text-gray-600 mb-6 underline decoration-blue-500 decoration-2 underline-offset-4 hover:decoration-blue-700">Cadastro do Produto</h2>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
          <div class="grid gap-4 gap-y-2 text-sm grid-cols-1">
            <div class="lg:col-span-2">
              <div class="grid gap-4 gap-y-8 text-sm grid-cols-1 md:grid-cols-3">
                <div class="md:col-span-2">
                  <label for="name" class="fw-semibold">PRODUTO</label>
                  <input wire:model="name" label="Produto" placeholder="Nome do Produto" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />                  
                  @error('name') 
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-2 rounded relative" role="alert">
                      <span class="block sm:inline font-bold">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
  
                <div class="md:col-span-2 md:grid-cols-2">
                  <label for="price">VALOR</label>
                  <input wire:model="price" placeholder="Preço" type="number" name="price" id="price" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  @error('price')  
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-2 rounded relative" role="alert">
                      <span class="block sm:inline font-bold">{{ $message }}</span>
                    </div>
                  @enderror
              </div>

                <div class="md:col-span-4 grid-cols-12">
                  <label for="description">DESCRIÇÃO</label>
                  <x-textarea placeholder='Informações sobre o Produto' wire:model="description" class="h-32 border mt-1 rounded px-4 w-full bg-gray-50" name="" id="" cols="30" rows="10" right-icon="menu-alt-3" style="overflow:auto;resize:none"></x-textarea>
                  @error('description') 
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mt-2 rounded relative" role="alert">
                      <span class="block sm:inline font-bold">{{ $message }}</span>
                    </div>
                  @enderror
                </div>
                
                <div class="md:col-span-4 text-right">
                  <div class="inline-flex items-end gap-2">
                    <button wire:click='cadastrarProduto' class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Cadastrar</button>
                    <button wire:click='home' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Voltar</button>
                  </div>
                </div>
  
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>