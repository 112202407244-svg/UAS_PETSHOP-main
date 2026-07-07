<h2><?= htmlspecialchars($title ?? 'Data Produk') ?></h2>

<?php if (!empty($_SESSION['success'])): ?>
    <p style="color: green;"><?= htmlspecialchars($_SESSION['success']) ?></p>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color: red;"><?= htmlspecialchars($_SESSION['error']) ?></p>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<p>
    <a href="<?= BASE_URL ?>index.php?url=product/create">+ Tambah Produk</a>
</p>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $i => $product): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td>
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= BASE_URL ?>storage/produk/<?= htmlspecialchars($product['image']) ?>" width="60">
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['category_name'] ?? '-') ?></td>
                    <td>Rp <?= number_format((float) $product['price'], 0, ',', '.') ?></td>
                    <td><?= (int) $product['stock'] ?></td>
                    <td><?= $product['is_active'] ? 'Aktif' : 'Nonaktif' ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>index.php?url=product/show/<?= $product['id'] ?>">Detail</a> |
                        <a href="<?= BASE_URL ?>index.php?url=product/edit/<?= $product['id'] ?>">Edit</a> |
                        <a href="<?= BASE_URL ?>index.php?url=product/delete/<?= $product['id'] ?>"
                           onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" style="text-align:center;">Belum ada produk.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>