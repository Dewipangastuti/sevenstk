<?php

namespace App\Http\Controllers;

use App\Models\Options;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\ProductSkus;
use App\Models\SkuValue;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Http;
class SkuValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->SkuValue = new SkuValue();
    }

    //menampilkan semua data
    public function index()
    {

        $produk = Product::paginate(10);
        $backup = [];

        $init = 0;
        foreach($produk as $key => $product){
            $sku = ProductSkus::where('id_product', $product->id_product)->get();
            $option = Options::where('id_product', $product->id_product)->get();
            $optionvalue = OptionValue::where('id_product', $product->id_product)->get();
            $skuvalue = SkuValue::where('id_product', $product->id_product)->get();

            foreach($sku as $kunci => $sku_one){
                $more = OptionValue::where('id_product', $sku_one->id_product)->get();
                foreach($more as $mores){
                    $backup[$init]['option'] = $option;
                    $backup[$init]['sku'] = $sku;
                    $backup[$init]['optionvalue'] = $optionvalue;
                    $backup[$init]['id_product'] = $mores->id_product;
                    $backup[$init]['product'] = $product->produk_name;
                    $backup[$init]['warna'] = $mores->warna;
                    $backup[$init]['s'] = $mores->s;
                    $backup[$init]['m'] = $mores->m;
                    $backup[$init]['l'] = $mores->l;
                    $backup[$init]['xl'] = $mores->xl;
                    $backup[$init]['xxl'] = $mores->xxl;
                    $backup[$init]['model'] = $mores->model;
                    $backup[$init]['value_name'] = $mores->value_name;
                    $init++;
                }
            }
        }

        return response()->json(["produk" => $produk, "backup" => $backup]);
    }






    //menampilkan view index stock tabel
    public function index_view()
    {
        $produk = Product::paginate(10);
        $backup = [];

        $init = 0;
        foreach($produk as $key => $product){
            $sku = ProductSkus::where('id_product', $product->id_product)->get();
            $option = Options::where('id_product', $product->id_product)->get();
            $optionvalue = OptionValue::where('id_product', $product->id_product)->get();
            $skuvalue = SkuValue::where('id_product', $product->id_product)->get();

            foreach($sku as $kunci => $sku_one){
                $more = OptionValue::where('id_product', $sku_one->id_product)->get();
                foreach($more as $mores){
                    $backup[$init]['option'] = $option;
                    $backup[$init]['sku'] = $sku;
                    $backup[$init]['optionvalue'] = $optionvalue;
                    $backup[$init]['id_product'] = $mores->id_product;
                    $backup[$init]['product'] = $product->produk_name;
                    $backup[$init]['warna'] = $mores->warna;
                    $backup[$init]['s'] = $mores->s;
                    $backup[$init]['m'] = $mores->m;
                    $backup[$init]['l'] = $mores->l;
                    $backup[$init]['xl'] = $mores->xl;
                    $backup[$init]['xxl'] = $mores->xxl;
                    $backup[$init]['model'] = $mores->model;
                    $backup[$init]['value_name'] = $mores->value_name;
                    $init++;
                }
            }
        }

        return view('stock') ->with(["produk" => $produk, "backup" => $backup]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */


    // menambahkan data ke tabel relasi
    public function store(Request $request)
    {
        $data = $request->all();

        $produk = new Product();
        $produk->produk_name = $data['produk_name'];
        $produk->save();

        $option = new Options();
        $option->id_product = $data['id_product'];
        $option->option_name = $data['option_name'];
        $option->save();

        $produksku = new ProductSkus();
        $produksku->id_product = $data['id_product'];
        $produksku->sku = $data['sku'];
        $produksku->stock = $data['stock'];
        $produksku->poin = $data['poin'];
        $produksku->save();

        $optionvalue = new OptionValue();
        $optionvalue->option_id = $data['option_id'];
        $optionvalue->id_product = $data['id_product'];
        $optionvalue->value_name = $data['value_name'];
        $optionvalue->save();

        $skuvalue = new SkuValue();
        $skuvalue->id_product = $data['id_product'];
        $skuvalue->sku_id = $data['id_product'];
        $skuvalue->option_id = $data['id_product'];
        $skuvalue->value_id = $data['id_product'];
        $skuvalue->save();

        $stock = new Stock();
        $stock->id_product = $produk->id_product;
        $stock->product_name = $produk->produk_name;
        $stock-> stock_awal = $produksku->stock;
        $stock-> stock_masuk = $data['stock_masuk'];
        $stock-> stock_keluar = $data['stock_keluar'];
        $stock-> stock_akhir = $data['stock_akhir'];
        $stock->save();

        return response()->json([
            'data berhasil di tambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\sku_value $sku_value
     *
     * @return \Illuminate\Http\Response
     */
    public function show(sku_value $sku_value)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\sku_value $sku_value
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(sku_value $sku_value)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\sku_value    $sku_value
     *
     * @return \Illuminate\Http\Response
     */

     //update merubah data dari semua tabel berelasi
    public function update(
        Request $request,
        SkuValue $skuvalue,
        Options $option,
        OptionValue $optionvalue,
        Product $produk,
        ProductSkus $produksku,
        Stock $stock,
        $id
    )

    {

        $pull = $request->all();

        $produk = Product::find($id);
        $produk->produk_name = $pull['produk_name'];
        $produk->save();

        $option = Options::find($id);
        $option->id_product = $pull['id_product'];
        $option->option_name = $pull['option_name'];
        $option->save();

        $produksku = ProductSkus::find($id);
        $produksku->id_product = $pull['id_product'];
        $produksku->sku = $pull['sku'];
        $produksku->stock = $pull['stock'];
        $produksku->poin = $pull['poin'];
        $produksku->save();

        $optionvalue = OptionValue::find($id);
        $optionvalue->option_id = $pull['option_id'];
        $optionvalue->id_product = $pull['id_product'];
        $optionvalue->value_name = $pull['value_name'];
        $optionvalue->save();

        $skuvalue = SkuValue::find($id);
        $skuvalue->id_product = $pull['id_product'];
        $skuvalue->sku_id = $pull['id_product'];
        $skuvalue->option_id = $pull['id_product'];
        $skuvalue->value_id = $pull['id_product'];
        $skuvalue->save();

        $stock = Stock::find($id);
        $stock->id_product = $produk->id_product;
        $stock->product_name = $produk->produk_name;
        $stock-> stock_awal = $produksku->stock;
        $stock-> stock_masuk = $pull['stock_masuk'];
        $stock-> stock_keluar = $pull['stock_keluar'];
        $stock-> stock_akhir = $pull['stock_akhir'];
        $stock->save();

        return response()->json([
            $stock,
            $skuvalue,
            $option,
            $optionvalue,
            $produk,
            $produksku->with('data berhasil di update'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\sku_value $sku_value
     *
     * @return \Illuminate\Http\Response
     */

    // mendelete data dari tabel sku_value
    public function delete(Request $req)
    {
        $id = $req->id;

        DB::table('sku_values')->where('id', $id)->delete();

        return response()->json([
            'result' => 'Berhasil Menghapus data',
        ]);
    }

    // search data by id
    // public function search($id_product)
    // {
    //     $produk = Product::find($id_product);
    //     $sku = ProductSkus::where('id_product', $id_product)->get();
    //     $option = Options::where('id_product', $id_product)->get();
    //     $optionvalue = OptionValue::where('id_product', $id_product)->get();
    //     $skuvalue = SkuValue::where('id_product', $id_product)->get();

    //     $produk['option'] = $option;
    //     $produk['sku'] = $sku;
    //     $produk['optionvalue'] = $sku;
    //     $produk['skuvalue'] = $sku;

    //     return response()->json([
    //         $produk,

    //     ]);
    // }
    public function cari(){
        $search = request('cari');
        $produk = Product::orderBy('id_product');
        if($search == '' || !$search){
            $produk = $produk->get();
        } else {
            $produk = Product::where('produk_name', 'like', '%' . $search . '%')->get();
        }
        $backup = [];
        $init = 0;
        foreach($produk as $key => $product){
            $sku = ProductSkus::where('id_product', $product->id_product)->get();
            $option = Options::where('id_product', $product->id_product)->get();
            $optionvalue = OptionValue::where('id_product', $product->id_product)->get();
            $skuvalue = SkuValue::where('id_product', $product->id_product)->get();

            foreach($sku as $kunci => $sku_one){
                $more = OptionValue::where('id_product', $sku_one->id_product)->get();
                foreach($more as $mores){
                    $backup[$init]['option'] = $option;
                    $backup[$init]['sku'] = $sku;
                    $backup[$init]['optionvalue'] = $optionvalue;
                    $backup[$init]['id_product'] = $mores->id_product;
                    $backup[$init]['product'] = $product->produk_name;
                    $backup[$init]['warna'] = $mores->warna;
                    $backup[$init]['ukuran'] = $mores->ukuran;
                    $backup[$init]['model'] = $mores->model;
                    $backup[$init]['value_name'] = $mores->value_name;
                    $init++;
                }
            }
        }

        return response()->json(["produk" => $produk, "backup" => $backup]);
    }


    //fungsi report data excel
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'id_stock');
        $sheet->setCellValue('B1', 'product_name');
        $sheet->setCellValue('C1', 'stock_awal');
        $sheet->setCellValue('D1', 'stock_masuk');
        $sheet->setCellValue('E1', 'stock_keluar');
        $sheet->setCellValue('F1', 'stock_akhir');
        $koneksi = mysqli_connect('localhost', 'root', '', 'incstocks');
        $query = mysqli_query($koneksi,"select * from stocks");
        $i = 2;
        $no = 1;
        while($row = mysqli_fetch_array($query))
        {
	        $sheet->setCellValue('A'.$i, $no++);
          	$sheet->setCellValue('B'.$i, $row['product_name']);
	        $sheet->setCellValue('C'.$i, $row['stock_awal']);
	        $sheet->setCellValue('D'.$i, $row['stock_masuk']);
	        $sheet->setCellValue('E'.$i, $row['stock_keluar']);
	        $sheet->setCellValue('F'.$i,'=C' . $i . '+D' . $i . '-E' . $i, $row['stock_akhir']);
            $i++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('ReportBarang.xlsx');
    }
}
