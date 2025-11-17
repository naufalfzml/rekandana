<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal Baru untuk {{ $sponsor->company_name }}</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f3f4f6; line-height: 1.6;">
    <div style="max-width: 600px; margin: 32px auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); color: #ffffff; padding: 32px 24px; text-align: center;">
            <h1 style="margin: 0; font-size: 24px; font-weight: 700;">📩 Proposal Baru Ditujukan untuk Anda!</h1>
        </div>

        <!-- Content -->
        <div style="padding: 32px 24px; color: #1f2937;">
            <p style="margin-top: 0; margin-bottom: 16px;">Yth. <strong style="font-weight: 600;">{{ $sponsor->company_name }}</strong>,</p>

            <p style="margin-bottom: 16px;">Kami informasikan bahwa seorang mahasiswa telah mengirimkan proposal yang ditujukan khusus untuk perusahaan Anda. Proposal ini telah melalui proses moderasi dan disetujui oleh tim kami.</p>

            <!-- Mahasiswa Info -->
            <div style="background: linear-gradient(135deg, #ede9fe 0%, #ddd6fe 100%); border-left: 4px solid #7c3aed; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #5b21b6;">👤 Pengaju Proposal</h3>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Nama:</strong> {{ $mahasiswa->name }}</p>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Universitas:</strong> {{ $mahasiswa->university }}</p>
                @if($mahasiswa->no_hp)
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Kontak:</strong> {{ $mahasiswa->no_hp }}</p>
                @endif
            </div>

            <!-- Proposal Info -->
            <div style="background-color: #f9fafb; border-left: 4px solid #4f46e5; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #4f46e5;">📄 Detail Proposal</h3>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Judul:</strong> {{ $proposal->title }}</p>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Kategori:</strong> {{ $proposal->kategori }}</p>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Bidang:</strong> {{ $proposal->bidang }}</p>
                @if($proposal->penyelenggara)
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Penyelenggara:</strong> {{ $proposal->penyelenggara }}</p>
                @endif
                @if($proposal->tanggal_acara)
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Tanggal Acara:</strong> {{ \Carbon\Carbon::parse($proposal->tanggal_acara)->format('d F Y') }}</p>
                @endif
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Target Pendanaan:</strong> Rp {{ number_format($proposal->funding_goal, 0, ',', '.') }}</p>
            </div>

            <!-- Description Preview -->
            <div style="background-color: #fef3c7; border-left: 4px solid #f59e0b; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #d97706;">💡 Deskripsi Singkat</h3>
                <p style="margin: 0; color: #78350f;">{{ Str::limit($proposal->description, 200) }}</p>
            </div>

            <p style="margin-bottom: 16px;">Mahasiswa ini tertarik untuk menjalin kerjasama dengan <strong style="font-weight: 600;">{{ $sponsor->company_name }}</strong> dan berharap proposal ini dapat sesuai dengan visi perusahaan Anda.</p>

            <p style="margin-bottom: 24px;">Silakan tinjau proposal lengkap dan hubungi mahasiswa jika Anda tertarik untuk melanjutkan diskusi lebih lanjut.</p>

            <!-- CTA Buttons -->
            <div style="text-align: center; margin: 32px 0;">
                <a href="{{ url('/sponsor/proposals/direct') }}" style="display: inline-block; padding: 14px 28px; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); color: #ffffff; font-weight: 600; text-decoration: none; border-radius: 8px; margin: 8px; box-shadow: 0 4px 6px rgba(79, 70, 229, 0.3);">
                    📋 Lihat Proposal Lengkap
                </a>
                <a href="{{ url('/dashboard') }}" style="display: inline-block; padding: 14px 28px; background-color: #6b7280; color: #ffffff; font-weight: 600; text-decoration: none; border-radius: 8px; margin: 8px;">
                    🏠 Ke Dashboard
                </a>
            </div>

            <p style="margin-top: 32px; margin-bottom: 4px;">Salam hangat,</p>
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
