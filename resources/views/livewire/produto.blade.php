<div>
  <script>
    window.addEventListener('editProductId', event => {
        $openModal('editCardModal');
      })

      window.addEventListener('viewProductId', event => {
        $openModal('viewCardModal');
      })
    </script>

<x-modal.card title="Editar Produto" blur wire:model.defer="editCardModal">
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <x-input label="Produto" right-icon="shopping-cart" wire:model='name' />

      <x-input label="Preço" placeholder="Preço do Produto" right-icon="currency-dollar" wire:model='price' max='1000000' />

      <div class="col-span-1 sm:col-span-2">
        <x-textarea label="Descrição" placeholder="Informações sobre o  Produto" right-icon="menu-alt-3"  wire:model='description' style="overflow:auto;resize:none" rows="6"></x-textarea>
      </div>
  </div>

  <x-slot name="footer">
      <div class="flex justify-between gap-x-4">                                 
          <div class="flex gap-x-2">
              <x-button green label="Atualizar"  wire:click="editarProduto({{ $productId}})" icon="check" />
              <x-button red label="Cancelar" x-on:click="close" icon="x" />
          </div>
      </div>
  </x-slot>
</x-modal.card>


<x-modal.card title="Informações do Produto" blur wire:model.defer="viewCardModal">
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <x-input label="Produto" right-icon="shopping-cart" wire:model='name' />
      <x-input label="Preço" placeholder="Preço do Produto" right-icon="currency-dollar" wire:model='price' max='1000000' />

      <div class="col-span-1 sm:col-span-2">
        <x-textarea label="Descrição" placeholder="Informações sobre o  Produto" right-icon="menu-alt-3"  wire:model='description' style="overflow:auto;resize:none" rows="6"></x-textarea>
      </div>
  </div>

  <x-slot name="footer">
      <div class="flex justify-between gap-x-4">                                 
          <div class="flex gap-x-2">
              <x-button indigo label="Fechar" x-on:click="close" icon="x" />
          </div>
      </div>
  </x-slot>
</x-modal.card>

@if ($products->isNotEmpty())
    <div class="min-h-screen p-6 bg-gray-200 flex items-start mt-14 justify-center mt-14 shadow-md">
      <table class="container max-w-screen-lg mx-auto w-full text-sm text-center text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      Produto
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Valor
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Ações
                </th>
              </tr>
          </thead>
     
      @foreach ($products as $product)
      <tbody> 
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $product['name'] }}
              </th>
              <td class="px-6 py-4">
                  {{ $product['price'] }}
              </td>

              <td class="px-6 py-4">
                  <x-button positive label="" right-icon="eye" wire:click="viewModal({{ $product['id'] }})"></x-button>
                  <x-button indigo label="" right-icon="pencil" wire:click="editModal({{ $product['id'] }})"></x-button>
                  <x-button red label="" right-icon="trash" wire:click='delete({{ $product["id"] }})'></x-button>
              </td>
          </tr>
      </tbody>
      @endforeach
  </table>
</div>
@else
    <div class="container mt-32 max-w-screen-lg mx-auto w-full text-sm text-center ">
      <h2 class="tracking-widest text-xl title-font font-medium text-gray-400 mb-1 hover:text-gray-500">Nenhum produto encontrado</h2>
      <h1 class="underline underline-offset-4 decoration-2 title-font text-lg font-medium text-gray-600 mb-3 hover:text-green-500"><a href="/cadastro">Cadastrar Produto</a></h1>
    </div>
@endif

            {{-- <section class="text-gray-600 body-font">
              <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                  @if ($products->isNotEmpty())
                      @foreach ($products as $product)
                          <div class="p-4 md:w-1/3">
                            <div class="h-full rounded-xl shadow-cla-blue bg-gradient-to-r from-indigo-50 to-blue-50 overflow-hidden">
                              <img class="lg:h-48 md:h-36 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="{{ asset('laravel-livewire.jpg') }}" alt="blog">

                              <div class="p-6">
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">PRODUTO</h2>
                                <h1 class="title-font text-lg font-medium text-gray-600 mb-3">{{ $product['name'] }}</h1>
                                <p class="leading-relaxed mb-3">{{ $product['description'] }}</p>
                                <p class="leading-relaxed mb-3">R$ {{ $product['price'] }}</p>
                                <div class="flex items-center flex-wrap gap-2 ">
                                    
                                  <x-button indigo label="Editar" wire:click="editModal({{ $product['id'] }})" onclick="$openModal('cardModal')" right-icon="pencil"></x-button>
                                  <x-button red label="Excluir" wire:click='delete({{ $product["id"] }})' right-icon="trash"></x-button>
                                </div>
                              </div>
                            </div>
                          </div>
                      @endforeach    
                    @else
                        <div class="p-12">
                          <h2 class="tracking-widest text-xl title-font font-medium text-gray-400 mb-1 hover:text-gray-500">Nenhum produto encontrado</h2>
                          <h1 class="underline underline-offset-4 decoration-2 title-font text-lg font-medium text-gray-600 mb-3 hover:text-green-500"><a href="/cadastro">Cadastrar Produto</a></h1>
                        </div>
                  @endif  
              </div>
            </section> --}}
</div>

