class Hadiah {
  final String toko;
  final String hadiah;
  final String tanggal;
  final bool received;
  final String failedReason;

  Hadiah({
    required this.toko,
    required this.hadiah,
    required this.tanggal,
    required this.received,
    required this.failedReason,
  });

  factory Hadiah.fromJson(Map<String, dynamic> json) {
    return Hadiah(
      toko: json['toko'],
      hadiah: json['hadiah'],
      tanggal: json['tanggal'],
      received: json['received'],
      failedReason: json['failedReason'],
    );
  }
}
