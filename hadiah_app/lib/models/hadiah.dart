class Hadiah {
  final int id;
  final int tokoId;
  final String docNumber;
  final bool received;
  final String receivedDate;
  final String failedReason;
  final Toko toko;

  Hadiah({
    required this.id,
    required this.tokoId,
    required this.docNumber,
    required this.received,
    required this.receivedDate,
    required this.failedReason,
    required this.toko,
  });

  factory Hadiah.fromJson(Map<String, dynamic> json) {
    return Hadiah(
      id: json['id'],
      tokoId: json['toko_id'],
      docNumber: json['doc_number'],
      received: json['received'],
      receivedDate: json['received_date'] ?? '',
      failedReason: json['failed_reason'] ?? '',
      toko: Toko.fromJson(json['toko']),
    );
  }
}

class Toko {
  final int id;
  final String name;
  final String address;
  final String phone;

  Toko({
    required this.id,
    required this.name,
    required this.address,
    required this.phone,
  });

  factory Toko.fromJson(Map<String, dynamic> json) {
    return Toko(
      id: json['id'],
      name: json['name'],
      address: json['address'],
      phone: json['phone'],
    );
  }
}
