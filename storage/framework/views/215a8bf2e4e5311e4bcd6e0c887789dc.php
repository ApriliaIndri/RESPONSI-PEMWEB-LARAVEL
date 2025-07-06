<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Pengeluaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(135deg, #6fb9cf 0%, #8fb3d8 40%, #a9aedb 70%, #baa8dd 100%);
            background-size: 100% 200%;
            background-repeat: no-repeat;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            box-sizing: border-box;
        }

        .container {
            max-width: 960px;
        }

        .table thead, .table tbody, .table tr, .table td, .table th {
            background-color: transparent !important;
            border-color: black;
            color: #000;
        }

        .table {
            box-shadow: none;
            margin-top: 40px;
        }

        .btn-custom {
            border-radius: 10px;
            padding: 6px 16px;
            background-color: #66aaff;
            border: 1px solid #66aaff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #3399ff;
            border-color: #3399ff;
        }

        h2 {
            font-weight: 700;
            font-size: 40px;
            margin-bottom: 40px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .text-custom-muted {
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Data Pengeluaran Harian</h2>

        <div class="mb-4 text-center">
            <a href="<?php echo e(route('expenses.create')); ?>" class="btn btn-primary btn-custom">+ Tambah Pengeluaran</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center shadow-sm">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Jumlah (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($expense->tanggal); ?></td>
                            <td><?php echo e($expense->judul); ?></td>
                            <td>Rp <?php echo e(number_format($expense->jumlah, 0, ',', '.')); ?></td>
                            <td>
                                <a href="<?php echo e(route('expenses.edit', $expense->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="<?php echo e(route('expenses.destroy', $expense->id)); ?>" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-custom-muted">⚠️ Belum ada data pengeluaran.</td>
                        </tr>
                    <?php endif; ?>
                    <tr class="table-info">
                        <td colspan="2"><strong>Total</strong></td>
                        <td colspan="2"><strong>Rp <?php echo e(number_format($total, 0, ',', '.')); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\MAMP\htdocs\pengeluaran-harian\resources\views/expenses/index.blade.php ENDPATH**/ ?>