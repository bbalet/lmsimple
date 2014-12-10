using System;

namespace CSharpClient
{
    /// <summary>
    /// Leave Object suitable for UI presentation
    /// </summary>
    public class LeaveEmployee
    {
        public int Id { get; set; }
        public string Status { get; set; }
        public DateTime StartDate { get; set; }
        public DateTime EndDate { get; set; }
        public double Duration { get; set; }
        public string Type { get; set; }
    }
}
