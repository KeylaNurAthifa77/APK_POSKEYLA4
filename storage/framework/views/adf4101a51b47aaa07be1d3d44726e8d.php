<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk #<?php echo e($penjualan->id); ?></title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            width: 58mm; /* Sesuaikan dengan lebar kertas printer thermal (58mm / 80mm) */
            margin: 0 auto;
            padding: 5px;
            color: #000;
        }
        .text-center { text-align: center; }
        .text-end { text-align: right; }
        .fw-bold { font-weight: bold; }
        .line { border-top: 1px dashed #000; margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; }
        td { vertical-align: top; padding: 2px 0; }
        @media print {
            @page {
                margin: 0;
            }
            body {
                margin: 0 auto;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="no-print" style="margin-bottom: 15px; text-align: center;">
        <button onclick="window.print()" style="padding: 5px 10px; cursor: pointer;">Cetak Lagi</button>
        <button onclick="window.close()" style="padding: 5px 10px; cursor: pointer;">Tutup</button>
    </div>

    <div class="text-center">
        <h3 style="margin: 0;">NAMA TOKO ANDA</h3>
        <p style="margin: 2px 0;">Jl. Contoh No. 123, Kota</p>
        <p style="margin: 2px 0;">Telp: 0812-3456-7890</p>
    </div>

    <div class="line"></div>

    <table>
        <tr>
            <td>No TRX</td>
            <td class="text-end">#<?php echo e($penjualan->id); ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td class="text-end"><?php echo e($penjualan->created_at->format('d/m/Y H:i')); ?></td>
        </tr>
        <tr>
            <td>Kasir</td>
            <td class="text-end"><?php echo e($penjualan->user->name ?? 'Kasir'); ?></td>
        </tr>
    </table>

    <div class="line"></div>

    
    <table>
        <?php $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="2" class="fw-bold"><?php echo e($item->produk->nama ?? 'Produk'); ?></td>
        </tr>
        <tr>
            <td><?php echo e($item->kuantitas); ?> x <?php echo e(number_format($item->harga_satuan, 0, ',', '.')); ?></td>
            <td class="text-end"><?php echo e(number_format($item->subtotal, 0, ',', '.')); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <div class="line"></div>

    
    <table>
        <tr>
            <td class="fw-bold">Total</td>
            <td class="text-end fw-bold">Rp <?php echo e(number_format($penjualan->total_pembayaran, 0, ',', '.')); ?></td>
        </tr>
        <tr>
            <td>Metode</td>
            <td class="text-end"><?php echo e($penjualan->metode_pembayaran); ?></td>
        </tr>
        <tr>
            <td>Bayar</td>
            <td class="text-end">Rp <?php echo e(number_format($bayar, 0, ',', '.')); ?></td>
        </tr>
        <tr>
            <td>Kembali</td>
            <td class="text-end">Rp <?php echo e(number_format($kembalian, 0, ',', '.')); ?></td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="text-center" style="margin-top: 10px;">
        <p style="margin: 2px 0;">-- Terima Kasih --</p>
        <p style="margin: 2px 0;">Barang yang sudah dibeli</p>
        <p style="margin: 2px 0;">tidak dapat ditukar/dikembalikan</p>
    </div>

</body>
</html><?php /**PATH C:\laragon\www\APK_POSKEYLA3\resources\views/penjualan/struk.blade.php ENDPATH**/ ?>