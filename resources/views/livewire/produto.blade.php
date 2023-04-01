<div>
            <section class="text-gray-600 body-font">
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
                                  <a href="{{ route('editar',['id'=>$product->id]) }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 font-bold hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg text-white">EDITAR</a>
                                  <button wire:click='delete({{ $product['id'] }})' class="bg-gradient-to-r from-red-400 to-orange-400 font-bold hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg text-white">REMOVER</button>
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
            </section>
</div>

