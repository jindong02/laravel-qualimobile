<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Image;
use Config;
use Cache;
use App\Models\Produto;
use App\Models\Subcategoria;
use App\Models\Categoria;

class Core extends Controller {

    public function Download() {
        exit;

        $xmlString = file_get_contents(public_path('xml.xml'));

        $xmlObject = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_NOCDATA);

        $json = json_encode($xmlObject);

        $phpArray = json_decode($json);

        $i = 0;
        foreach ($phpArray->channel->item as $item) {

            if (true) {

                $item->imgs = (array) $item->imgs;

                if (isset($item->imgs['link']) && isset($item->imgs['link'][0]) && strlen(trim($item->imgs['link'][0])) >= 5) {
                    $i++;

                    $produto = new Produto();

                    $imagens = [];

                    foreach ($item->imgs['link'] as $link) {
                        $link = trim($link);

                        if (!empty($link)) {
                            $nomeImagem = md5(basename($link));
                            $img = Image::make($link);

                            $img->resize(null, 600, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })->encode('webp', 90);

                            $img->save(storage_path('app/public/produtos/' . $nomeImagem . '.webp'));

                            $imagens[] = $nomeImagem . '.webp';
                        }
                    }

                    $produto->imagem = $imagens;
                    $produto->nome = strval($item->title);
                    $produto->slug = Str::slug($produto->nome . ' ' . rand(), '-');

                    $keyCategoria = 0;

                    foreach (explode(',', str_replace(array("\r", "\n", "\t"), '', $item->categoria)) as $categoria) {
                        $categoria = trim($categoria);

                        if (!empty($categoria)) {
                            if ($keyCategoria == 0) {

                                $keyCategoria++;

                                $Categoria = Categoria::firstOrNew(['nome' => $categoria]);

                                $Categoria->save();

                                $produto->id_categoria = $Categoria->id;
                                continue;
                            } elseif ($keyCategoria == 1) {
                                $keyCategoria++;

                                $Subcategoria = Subcategoria::firstOrNew(['id_categoria' => $produto->id_categoria, 'nome' => $categoria]);

                                $Subcategoria->save();

                                $produto->id_sub_categoria = $Subcategoria->id;
                                continue;
                            }

                            break;
                        }
                    }

                    $produto->sku = str_replace(array("\r", "\n", "\t"), '', $item->sku);
                    $produto->tecnico = '';
                    $produto->descricao = html_entity_decode(strval($item->description));
                    $produto->save();
                }
            }
        }
    }

    public function Manifest() {
        return response()->json(Cache::rememberForever('manifest', function () {
                            return [
                                'name' => Config::get('app.name'),
                                'short_name' => Config::get('app.name'),
                                'start_url' => '.',
                                'scope' => '.',
                                'description' => Config::get('config.description'),
                                'theme_color' => '#000',
                                'icons' => [
                                    [
                                        'src' => url('assets/img/favicons/android-icon-36x36.png'),
                                        'sizes' => '36x36',
                                        'type' => 'image/png',
                                        'purpose' => 'any',
                                    ],
                                    [
                                        'src' => url('assets/img/favicons/android-icon-48x48.png'),
                                        'sizes' => '48x48',
                                        'type' => 'image/png',
                                        'purpose' => 'any',
                                    ],
                                    [
                                        'src' => url('assets/img/favicons/android-icon-72x72.png'),
                                        'sizes' => '72x72',
                                        'type' => 'image/png',
                                        'purpose' => 'any',
                                    ],
                                    [
                                        'src' => url('assets/img/favicons/android-icon-96x96.png'),
                                        'sizes' => '96x96',
                                        'type' => 'image/png',
                                        'purpose' => 'any',
                                    ],
                                    [
                                        'src' => url('assets/img/favicons/android-icon-144x144.png'),
                                        'sizes' => '144x144',
                                        'type' => 'image/png',
                                        'purpose' => 'any',
                                    ],
                                    [
                                        'src' => url('assets/img/favicons/android-icon-192x192.png'),
                                        'sizes' => '192x192',
                                        'type' => 'image/png',
                                        'purpose' => 'any',
                                    ],
                                    [
                                        'src' => url('assets/img/favicons/android-icon-512x512.png'),
                                        'sizes' => '512x512',
                                        'type' => 'image/png',
                                        'purpose' => 'any',
                                    ],
                                ],
                                'background_color' => '#FFFFFF',
                                'display' => 'fullscreen',
                                'display_override' => ['window-controls-overlay', 'fullscreen'],
                                'capture_links' => 'none',
                                'orientation' => 'portrait-primary',
                                'categories' => ['utilities', 'finance', 'productivity'],
                                'shortcuts' => [
                                    [
                                        'name' => __('Página inicial'),
                                        'short_name' => __('Início'),
                                        'url' => '/dashboard',
                                        'icons' => [
                                            [
                                                'src' => url('/assets/svg/icons/chart.svg'),
                                                'sizes' => '96x96',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => __('Novo investimento'),
                                        'short_name' => __('Investir'),
                                        'url' => '/investir',
                                        'icons' => [
                                            [
                                                'src' => url('/assets/svg/icons/plus.svg'),
                                                'sizes' => '96x96',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => __('Meus investimentos'),
                                        'short_name' => __('Investimentos'),
                                        'url' => '/investimentos',
                                        'icons' => [
                                            [
                                                'src' => url('/assets/svg/icons/page.svg'),
                                                'sizes' => '96x96',
                                            ],
                                        ],
                                    ],
                                    [
                                        'name' => __('Minha Conta'),
                                        'short_name' => __('Configurações'),
                                        'url' => '/configuracoes',
                                        'icons' => [
                                            [
                                                'src' => url('/assets/svg/icons/user.svg'),
                                                'sizes' => '96x96',
                                            ],
                                        ],
                                    ],
                                ],
                            ];
                        }));
    }

}
