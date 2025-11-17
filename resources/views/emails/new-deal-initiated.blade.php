<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deal Baru untuk Proposal Anda</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f3f4f6; line-height: 1.6;">
    <div style="max-width: 600px; margin: 32px auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; padding: 32px 24px; text-align: center;">
            <h1 style="margin: 0; font-size: 24px; font-weight: 700;">🎉 Kabar Gembira! Ada Sponsor Tertarik!</h1>
        </div>

        <!-- Content -->
        <div style="padding: 32px 24px; color: #1f2937;">
            <p style="margin-top: 0; margin-bottom: 16px;">Halo, <strong style="font-weight: 600;">{{ $mahasiswa->name }}</strong>!</p>

            <p style="margin-bottom: 16px; font-size: 16px; color: #059669; font-weight: 600;">Selamat! 🎊 Ada sponsor yang tertarik dengan proposal Anda!</p>

            <!-- Sponsor Info -->
            <div style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border-left: 4px solid #10b981; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #065f46;">🏢 Informasi Sponsor</h3>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Perusahaan:</strong> {{ $sponsor->company_name }}</p>
                @if($sponsor->industry)
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Industri:</strong> {{ $sponsor->industry }}</p>
                @endif
                @if($sponsor->website)
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Website:</strong> <a href="{{ $sponsor->website }}" style="color: #059669; text-decoration: none;">{{ $sponsor->website }}</a></p>
                @endif
            </div>

            <!-- Proposal Info -->
            <div style="background-color: #f9fafb; border-left: 4px solid #4f46e5; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #4f46e5;">📄 Proposal Anda</h3>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Judul:</strong> {{ $proposal->title }}</p>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Kategori:</strong> {{ $proposal->kategori }}</p>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Target Pendanaan:</strong> Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}</p>
            </div>

            <p style="margin-bottom: 16px;">Sponsor <strong style="font-weight: 600;">{{ $sponsor->company_name }}</strong> telah memulai deal dengan proposal Anda. Ini adalah kesempatan besar untuk mewujudkan proyek Anda!</p>

            <!-- Next Steps -->
            <div style="background-color: #fef3c7; border-left: 4px solid #f59e0b; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #d97706;">📋 Langkah Selanjutnya</h3>
                <ul style="margin: 8px 0; padding-left: 20px; color: #92400e;">
                    <li style="margin: 4px 0;">Pastikan kontak Anda aktif dan mudah dihubungi</li>
                    <li style="margin: 4px 0;">Siapkan presentasi atau dokumen pendukung proposal</li>
                    <li style="margin: 4px 0;">Sponsor akan menghubungi Anda dalam waktu dekat</li>
                    <li style="margin: 4px 0;">Jaga komunikasi yang baik dan profesional</li>
                </ul>
            </div>

            <p style="margin-bottom: 24px;">Kami merekomendasikan Anda untuk segera memeriksa dashboard dan mempersiapkan diri untuk diskusi lebih lanjut dengan sponsor.</p>

            <!-- Contact Info Box -->
            @if($mahasiswa->no_hp)
            <div style="background-color: #eff6ff; border-left: 4px solid #3b82f6; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #1e40af;">📞 Kontak Anda</h3>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Nomor HP:</strong> {{ $mahasiswa->no_hp }}</p>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Email:</strong> {{ $mahasiswa->email }}</p>
                <p style="margin: 8px 0 0 0; font-size: 14px; color: #1e40af;">Pastikan kontak ini selalu aktif untuk memudahkan sponsor menghubungi Anda.</p>
            </div>
            @endif

            <!-- CTA Button -->
            <div style="text-align: center; margin: 32px 0;">
                <a href="{{ url('/dashboard') }}" style="display: inline-block; padding: 14px 28px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; font-weight: 600; text-decoration: none; border-radius: 8px; box-shadow: 0 4px 6px rgba(16, 185, 129, 0.3);">
                    🏠 Lihat Dashboard
                </a>
            </div>

            <p style="margin-top: 32px; margin-bottom: 4px;">Semoga sukses dengan kolaborasi Anda!</p>
            <p style="margin: 0;">
                <strong style="font-weight: 600;">Tim Rekandana</strong><br>
                <span style="color: #6b7280; font-size: 14px;">Platform Kolaborasi Mahasiswa & Sponsor</span>
            </p>
        </div>

        <!-- Footer -->
        <div style="background-color: #f9fafb; border-top: 1px solid #e5e7eb; padding: 20px 24px; text-align: center;">
            <p style="margin: 0 0 4px 0; font-size: 12px; color: #6b7280;">Email ini dikirim secara otomatis dari sistem Rekandana.</p>
            <p style="margin: 0; font-size: 12px; color: #9ca3af;">&copy; {{ date('Y') }} Rekandana. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
